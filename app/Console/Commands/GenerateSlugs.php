<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\{Specialtie, SubSpecialtie, Conference, MedicalDevice, MedicalAcademy, Doctor, Article};

class GenerateSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto-generate slugs for all models from their titles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting slug generation...');

        $this->generateSlug(Specialtie::class, 'Specialtie', 'title', true);
        $this->generateSlug(SubSpecialtie::class, 'SubSpecialtie', 'main_title', true);
        $this->generateSlug(Conference::class, 'Conference', 'title', true);
        $this->generateSlug(MedicalDevice::class, 'MedicalDevice', 'title', true);
        $this->generateSlug(MedicalAcademy::class, 'MedicalAcademy', 'title', true);
        $this->generateSlug(Article::class, 'Article', 'title', true);

        $this->generateDoctorSlugs();

        $this->info('All slugs generated successfully!');
    }

    /**
     * Generate slugs for Doctors (special case with DoctorInfo)
     */
    private function generateDoctorSlugs()
    {
        $doctors = Doctor::whereNull('slug')->with('info')->get();

        if ($doctors->isEmpty()) {
            $this->info("Doctor: No records need slug generation");
            return;
        }

        $count = 0;
        foreach ($doctors as $doctor) {
            $title = null;
            
            if ($doctor->info) {
                // Try Arabic first, then English, then current locale
                $arName = $doctor->info->translate('ar')->name ?? null;
                $enName = $doctor->info->translate('en')->name ?? null;
                $currentName = $doctor->info->translate(app()->getLocale())->name ?? null;
                
                $title = $arName ?: $enName ?: $currentName;
            }
            
            if (!$title) {
                $title = 'doctor-' . $doctor->id;
            }

            // Generate slug
            $slug = Str::slug($title);

            // Ensure unique slug
            $baseSlug = $slug;
            $counter = 1;
            while (Doctor::where('slug', $slug)->where('id', '!=', $doctor->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            // Update the record
            $doctor->update(['slug' => $slug]);
            $count++;
        }

        $this->info("Doctor: Generated {$count} slugs");
    }

    /**
     * Generate slugs for a model
     */
    private function generateSlug($modelClass, $modelName, $titleField, $force = false)
    {
        $query = $modelClass::query();
        if (!$force) {
            $query->whereNull('slug');
        }

        $records = $query->get();

        if ($records->isEmpty()) {
            $this->info("ℹ{$modelName}: No records need slug generation");
            return;
        }

        $count = 0;
        foreach ($records as $record) {
            // Get the title from translatable attributes or direct field
            if (method_exists($record, 'translate')) {
                try {
                    // Try Arabic first (most content), then English, then current locale
                    $arTitle = $record->translate('ar')->$titleField ?? null;
                    $enTitle = $record->translate('en')->$titleField ?? null;
                    $currentTitle = $record->translate(app()->getLocale())->$titleField ?? null;

                    $title = $arTitle ?: $enTitle ?: $currentTitle ?: $record->$titleField ?: 'record-' . $record->id;
                } catch (\Exception $e) {
                    $title = $record->$titleField ?? 'record-' . $record->id;
                }
            } else {
                $title = $record->$titleField ?? 'record-' . $record->id;
            }

            // Generate slug
            $slug = Str::slug($title);

            // Ensure unique slug
            $baseSlug = $slug;
            $counter = 1;
            while ($modelClass::where('slug', $slug)->where('id', '!=', $record->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            // Update the record
            $record->update(['slug' => $slug]);
            $count++;
        }

        $this->info("{$modelName}: Generated {$count} slugs");
    }
}