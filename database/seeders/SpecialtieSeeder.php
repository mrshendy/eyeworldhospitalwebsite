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
           'img' =>'main1.svg',

           'ar'=>[
              'title'          => "طب وجراحه العيون",
              'detail_title'   => 'مجموعة شاملة من التخصصات لتغطية جميع احتياجات طب وجراحة العيون',
              'detail_subtitle'=> "تخصصات طبية دقيقة بأيدي خبراء عالميين لتلبية كافة احتياجات العيون",
              "desc"           => "في مستشفى دنيا العيون، نقدم مجموعة متكاملة من التخصصات التي تغطي جميع مجالات طب وجراحة العيون. نخدم مرضانا بأحدث التقنيات الطبية، وأفضل الخبرات الاستشارية لتوفير رعاية متميزة تشمل التشخيص الدقيق، العلاجات المتقدمة، والجراحات التجميلية والعلاجية وفقًا لأعلى المعايير الطبية."
           ],
           'en'=>[
              'title'  => "Ophthalmology",
              'detail_title'    => "A comprehensive range of specialties to cover all ophthalmology and eye surgery needs",
              'detail_subtitle' => "Precise medical specialties by world-class experts to meet all eye care needs",
              "desc"            => "At Donia Al Oyoun Hospital, we offer a full range of specialties covering all fields of ophthalmology and eye surgery. We serve our patients with the latest medical technologies and the best consulting expertise to provide exceptional care, including accurate diagnosis, advanced treatments, and both cosmetic and therapeutic surgeries in accordance with the highest medical standards."
            ]
        ]);

         Specialtie::create([
            'img' =>'main1.svg',
            'ar'=>[
                'title'  => "الجلديه",
             ],
             'en'=>[
                'title'  => "Dermatology",
              ]
         ]);


         Specialtie::create([
            'img' =>'main1.svg',
            'ar'=>[
                'title'  => "الاسنان",
             ],
             'en'=>[
                'title'  => "Teeth",
              ]
         ]);


         SubSpecialtie::create([
            'specialtie_id'=>1,
            'img' =>'1.svg',
            'ar'=>[
               'main_title'  => "أورام العيون",
               'main_subtitle'   => "علاج دقيق وشامل لأورام العين مع تقنيات متقدمة ورعاية متميزة",
               "detail_title"     => "تخصص اورام العين يوفر لك  رعايه دقيقه ومتخصصه",
               "detail_subtitle" => 'نحن متخصصون في علاج امراض العين بأحدث  الاساليب'
            ],
            'en'=>[
               'main_title'  => "Eye tumors",
               'main_subtitle'    => "Precise and comprehensive treatment for eye tumors with advanced technologies and exceptional care",
               "detail_title"     => "The Eye Tumor Specialty Provides You with Accurate and Specialized Care",
               "detail_subtitle" => "We specialize in treating eye diseases using the latest methods"
             ]
         ]);


         SubSpecialtie::create([
            'specialtie_id'=>1,
            'img' =>'1.svg',
            'ar'=>[
               'main_title'  => "المياه البيضاء",
            ],
            'en'=>[
               'main_title'  => "white color",
             ]
         ]);

         SubSpecialtie::create([
            'specialtie_id'=>1,
            'img' =>'1.svg',
            'ar'=>[
               'main_title'  => "الليزك",
            ],
            'en'=>[
               'main_title'  => "lyzik",
             ]
         ]);
    }
}
