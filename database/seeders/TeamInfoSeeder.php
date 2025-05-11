<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TeamInfo;

class TeamInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
            TeamInfo::Create([
             'img' => 'main.svg',
                'ar' => [
                 'title'    =>'استمع إلى تجارب مرضانا وتعرف على قصص نجاحهم مع خدماتنا الطبية المتنوعة',
                 'sub_title' => 'آراء حقيقية من عملائنا عن خدماتنا الطبية وتجاربهم الملهمة والنتائج المميزة',
                 'desc'    =>'آراء العملاء تمثل شهادات حقيقية على جودة خدماتنا الطبية. استمع إلى تجارب مرضانا في مختلف المجالات الصحية واكتشف كيف ساهمت خدماتنا في تحسين جودة حياتهم. نحن فخورون برضا عملائنا وثقتهم التي تلهمنا للتطوير المستمر.'
                 
            ],
 
            'en' => [
                'title'    => 'Listen to our patients’ experiences and discover their success stories with our diverse medical services',
                'sub_title' => 'Genuine opinions from our clients about our medical services, their inspiring experiences, and outstanding results',
                'desc'     => 'Customer opinions are genuine testimonials of the quality of our medical services. Listen to our patients’ experiences across various health fields and discover how our services have contributed to improving their quality of life. We are proud of our clients’ satisfaction and trust, which inspire us to continuously improve.',
            ],

         ]);
    }
}
