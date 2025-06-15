<?php
namespace App\Enums;

enum AcademicDegrees: string
{
    case Bachelor = 'bachelor';
    case Master = 'master';
    case PhD = 'phd';
    case Diploma = 'diploma';

    public function label(): string
    {
        return match($this) {
            self::Bachelor => __('Bachelor’s Degree'),
            self::Master => __('Master’s Degree'),
            self::PhD => __('PhD'),
            self::Diploma => __('Diploma'),
        };
    }

    public static function options(): array
    {
        return array_map(fn($degree) => [
            'value' => $degree->value,
            'label' => $degree->label(),
        ], self::cases());
    }
}