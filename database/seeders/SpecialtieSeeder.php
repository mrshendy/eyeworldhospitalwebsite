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
               'title'  => "أورام العيون",
            ],
            'en'=>[
               'title'  => "Eye tumors",
             ]
         ]);


         SubSpecialtie::create([
            'specialtie_id'=>1,
            'ar'=>[
               'title'  => "المياه البيضاء",
            ],
            'en'=>[
               'title'  => "white color",
             ]
         ]);

         SubSpecialtie::create([
            'specialtie_id'=>1,
            'ar'=>[
               'title'  => "الليزك",
            ],
            'en'=>[
               'title'  => "lyzik",
             ]
         ]);
    }
}
