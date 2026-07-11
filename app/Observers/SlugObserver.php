<?php

namespace App\Observers;

use Illuminate\Support\Str;

class SlugObserver
{
    protected $titleMap = [
        'App\\Models\\Specialtie' => 'title',
        'App\\Models\\SubSpecialtie' => 'main_title',
        'App\\Models\\Conference' => 'title',
        'App\\Models\\MedicalDevice' => 'title',
        'App\\Models\\MedicalAcademy' => 'title',
        'App\\Models\\Article' => 'title',
        'App\\Models\\Doctor' => 'name', // Special handling for Doctor model
    ];

    public function creating($model)
    {
        // Skip automatic slug generation for doctors - handled manually in controller
        if (!($model instanceof \App\Models\Doctor)) {
            $this->setSlug($model);
        }
    }

    public function updating($model)
    {
        // For doctors, only generate slug if it doesn't exist
        if ($model instanceof \App\Models\Doctor) {
            if (empty($model->slug)) {
                $this->setSlug($model);
            }
        } else {
            $this->setSlug($model);
        }
    }

    public function setSlug($model)
    {
        if (!empty($model->slug)) {
            return;
        }

        $class = get_class($model);
        if (!isset($this->titleMap[$class])) {
            return;
        }

        $field = $this->titleMap[$class];

        $value = null;
        
        // Special handling for Doctor model
        if ($class === 'App\\Models\\Doctor') {
            if ($model->info) {
                // Try English first, then Arabic, then current locale
                $enName = $model->info->translate('en')->name ?? null;
                $arName = $model->info->translate('ar')->name ?? null;
                $currentName = $model->info->translate(app()->getLocale())->name ?? null;

                $value = $enName ?: $arName ?: $currentName;
            } elseif ($model->relationLoaded('info') === false) {
                // Load the relationship if not loaded
                $model->load('info');
                if ($model->info) {
                    $enName = $model->info->translate('en')->name ?? null;
                    $arName = $model->info->translate('ar')->name ?? null;
                    $currentName = $model->info->translate(app()->getLocale())->name ?? null;

                    $value = $enName ?: $arName ?: $currentName;
                }
            }
        } elseif (isset($model->{$field})) {
            $value = $model->{$field};
        } elseif (method_exists($model, 'translate')) {
            try {
                // Try English first, then Arabic, then current locale
                $enTitle = $model->translate('en')->$field ?? null;
                $arTitle = $model->translate('ar')->$field ?? null;
                $currentTitle = $model->translate(app()->getLocale())->$field ?? null;

                $value = $enTitle ?: $arTitle ?: $currentTitle;
            } catch (\Exception $e) {
                $value = null;
            }
        }

        if (!$value) {
            return;
        }

        $slug = Str::slug($value);
        $baseSlug = $slug;
        $counter = 1;

        while ($class::where('slug', $slug)->where('id', '!=', $model->id ?? 0)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $model->slug = $slug;
    }
}