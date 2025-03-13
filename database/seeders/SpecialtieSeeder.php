<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Specialtie,SubSpecialtie};

class SpecialtieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Specialtie::create([
           'ar'=>[
              'title'  => "طب وجراحه العيون",
           ],
           'en'=>[
              'title'  => "Ophthalmology",
            ]
        ]);

         Specialtie::create([
            'ar'=>[
                'title'  => "الجلديه",
             ],
             'en'=>[
                'title'  => "Dermatology",
              ]
         ]);


         Specialtie::create([
            'ar'=>[
                'title'  => "الاسنان",
             ],
             'en'=>[
                'title'  => "Teeth",
              ]
         ]);


         SubSpecialtie::create([
            'specialtie_id'=>1,
            'ar'=>[
               'main_title'  => "أورام العيون",
            ],
            'en'=>[
               'main_title'  => "Eye tumors",
             ]
         ]);


         SubSpecialtie::create([
            'specialtie_id'=>1,
            'ar'=>[
               'main_title'  => "المياه البيضاء",
            ],
            'en'=>[
               'main_title'  => "white color",
             ]
         ]);

         SubSpecialtie::create([
            'specialtie_id'=>1,
            'ar'=>[
               'main_title'  => "الليزك",
            ],
            'en'=>[
               'main_title'  => "lyzik",
             ]
         ]);
    }
}
