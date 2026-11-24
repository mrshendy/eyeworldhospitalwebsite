<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use App\Traits\fileTrait;
use Illuminate\Http\Request;

class HomeContentController extends Controller
{
    use fileTrait;

    public function index()
    {
        $sections = config('home_content');

        return view('Admin.home-content.index', compact('sections'));
    }

    public function update(Request $request)
    {
        $rules = [];
        foreach (config('home_content') as $section) {
            foreach ($section['fields'] as $key => $field) {
                if ($field['type'] === 'image') {
                    $rules['images.'.$this->inputName($key)] = 'nullable|image|max:2048';
                }
            }
        }
        $request->validate($rules);

        foreach (config('home_content') as $section) {
            foreach ($section['fields'] as $key => $field) {
                $name = $this->inputName($key);

                if ($field['type'] === 'toggle') {
                    $this->store($key, $request->boolean('toggles.'.$name) ? '1' : '0', null);

                    continue;
                }

                if ($field['type'] === 'image') {
                    if ($request->hasFile('images.'.$name)) {
                        $file = $this->MoveImage($request->file('images.'.$name), 'uploads/home');
                        $this->store($key, $file, null);
                    } elseif ($request->boolean('reset_images.'.$name)) {
                        HomeContent::where('key', $key)->delete();
                    }

                    continue;
                }

                $ar = trim((string) $request->input('ar.'.$name, ''));
                $en = trim((string) $request->input('en.'.$name, ''));
                // Saving the untouched original text is the same as "use the default".
                $ar = $ar === HomeContent::defaultValue($key, 'ar') ? null : $ar;
                $en = $en === HomeContent::defaultValue($key, 'en') ? null : $en;
                $this->store($key, $ar, $en);
            }
        }

        HomeContent::flush();

        return redirect()->route('Admin.home-content.index')->with('success', __('Saved successfully'));
    }

    /** Dots are not allowed in input names, so "counter.1.number" becomes "counter__1__number". */
    public static function inputName(string $key): string
    {
        return str_replace('.', '__', $key);
    }

    private function store(string $key, ?string $ar, ?string $en): void
    {
        if (($ar === null || $ar === '') && ($en === null || $en === '')) {
            HomeContent::where('key', $key)->delete();

            return;
        }
        HomeContent::updateOrCreate(['key' => $key], ['value_ar' => $ar, 'value_en' => $en]);
    }
}
