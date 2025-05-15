<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Day;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Day::create([
            'name' =>'Saturday',
            'ar'=>[
                'title' =>'السبت'
            ],
            'en'=>[
                'title' =>'Saturday'
            ],
        ]);
        Day::create([
            'name' =>'Sunday',

            'ar'=>[
                'title' =>'الاحد'
            ],
            'en'=>[
                'title' =>'Sunday'
            ],
        ]);
        Day::create([
            'name' =>'Monday',

            'ar'=>[
                'title' =>'الاتنين'
            ],
            'en'=>[
                'title' =>'Monday'
            ],
        ]);
        Day::create([
            'name' =>'Tuesday',

            'ar'=>[
                'title' =>'الثلاثاء'
            ],
            'en'=>[
                'title' =>'Tuesday'
            ],
        ]);
        Day::create([
            'name' =>'Wednesday',

            'ar'=>[
                'title' =>'الاربعاء'
            ],
            'en'=>[
                'title' =>'Wednesday'
            ],
        ]);
        Day::create([
            'name' =>'Thursday',

            'ar'=>[
                'title' =>'الخميس'
            ],
            'en'=>[
                'title' =>'Thursday'
            ],
        ]);
        Day::create([
            'name' =>'friday',

            'ar'=>[
                'title' =>'الجمعه'
            ],
            'en'=>[
                'title' =>'friday'
            ],
        ]);
    }
}
