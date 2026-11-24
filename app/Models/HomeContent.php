<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $guarded = [];

    /** @var array<string, self>|null */
    protected static ?array $cache = null;

    public static function allKeyed(): array
    {
        if (static::$cache === null) {
            static::$cache = static::query()->get()->keyBy('key')->all();
        }

        return static::$cache;
    }

    public static function flush(): void
    {
        static::$cache = null;
    }

    /** Field definition from config/home_content.php */
    public static function field(string $key): ?array
    {
        foreach (config('home_content', []) as $section) {
            if (isset($section['fields'][$key])) {
                return $section['fields'][$key];
            }
        }

        return null;
    }

    /** The original (hard-coded) text, translated to the given locale. */
    public static function defaultValue(string $key, ?string $locale = null): string
    {
        $field = static::field($key);
        if (! $field) {
            return '';
        }
        $default = $field['default'];
        if (in_array($field['type'], ['image', 'toggle'], true)) {
            return (string) $default;
        }

        return collect((array) $default)
            ->map(fn ($k) => __($k, [], $locale))
            ->implode("\n");
    }

    /** Stored value for a locale, or the original text when nothing was saved. */
    public static function value(string $key, ?string $locale = null): string
    {
        $locale ??= app()->getLocale();
        $field = static::field($key);
        $row = static::allKeyed()[$key] ?? null;

        if ($row) {
            // images and toggles are shared between languages
            $stored = in_array($field['type'] ?? '', ['image', 'toggle'], true)
                ? $row->value_ar
                : $row->{'value_'.$locale};
            if ($stored !== null && $stored !== '') {
                return $stored;
            }
        }

        return static::defaultValue($key, $locale);
    }
}
