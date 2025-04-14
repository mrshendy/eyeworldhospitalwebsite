<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Right;

class RightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Right::create([
            'ar'  =>[
                 'title' => 'حق الحصول على رعاية صحية بجودة عالية',
                 'desc'  => 'يحق لكل مريض الحصول على رعاية طبية باستخدام أحدث التقنيات والتزام كامل بمعايير الجودة والسلامة.'
            ],
            'en'  =>[
                'title' => 'The right to high-quality health care',
                'desc'  => 'Every patient is entitled to medical care using the latest technology and full adherence to quality and safety standards.'
           ]
        ]);

        Right::create([
            'ar'  =>[
                 'title' => 'حق الحصول على رعاية صحية بجودة عالية',
                 'desc'  => 'يحق لكل مريض الحصول على رعاية طبية باستخدام أحدث التقنيات والتزام كامل بمعايير الجودة والسلامة.'
            ],
            'en'  =>[
                'title' => 'The right to high-quality health care',
                'desc'  => 'Every patient is entitled to medical care using the latest technology and full adherence to quality and safety standards.'
           ]
        ]);

        Right::create([
            'ar'  =>[
                 'title' => 'حق الحصول على رعاية صحية بجودة عالية',
                 'desc'  => 'يحق لكل مريض الحصول على رعاية طبية باستخدام أحدث التقنيات والتزام كامل بمعايير الجودة والسلامة.'
            ],
            'en'  =>[
                'title' => 'The right to high-quality health care',
                'desc'  => 'Every patient is entitled to medical care using the latest technology and full adherence to quality and safety standards.'
           ]
        ]);

        Right::create([
            'ar'  =>[
                 'title' => 'حق الحصول على رعاية صحية بجودة عالية',
                 'desc'  => 'يحق لكل مريض الحصول على رعاية طبية باستخدام أحدث التقنيات والتزام كامل بمعايير الجودة والسلامة.'
            ],
            'en'  =>[
                'title' => 'The right to high-quality health care',
                'desc'  => 'Every patient is entitled to medical care using the latest technology and full adherence to quality and safety standards.'
           ]
        ]);


        Right::create([
            'type' => 'dutie',
            'ar'  =>[
                 'title' => 'واجبات المريض',
                 'desc'  => 'يجب على المريض تزويد الفريق الطبي بكافة التفاصيل عن حالته الصحية لضمان التشخيص السليم.'
            ],
            'en'  =>[
                'title' => 'patient duties',
                'desc'  => 'The patient must provide the medical team with all details about his or her health condition to ensure an accurate diagnosis.'
           ]
        ]);


        Right::create([
            'type' => 'dutie',
            'ar'  =>[
                 'title' => 'واجبات المريض',
                 'desc'  => 'يجب على المريض تزويد الفريق الطبي بكافة التفاصيل عن حالته الصحية لضمان التشخيص السليم.'
            ],
            'en'  =>[
                'title' => 'patient duties',
                'desc'  => 'The patient must provide the medical team with all details about his or her health condition to ensure an accurate diagnosis.'
           ]
        ]);

        Right::create([
            'type' => 'dutie',
            'ar'  =>[
                 'title' => 'واجبات المريض',
                 'desc'  => 'يجب على المريض تزويد الفريق الطبي بكافة التفاصيل عن حالته الصحية لضمان التشخيص السليم.'
            ],
            'en'  =>[
                'title' => 'patient duties',
                'desc'  => 'The patient must provide the medical team with all details about his or her health condition to ensure an accurate diagnosis.'
           ]
        ]);


      
        

    }
}
