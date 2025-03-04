<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        About::create([
             'ar'=>[
               'title'     =>'مستشفى دنيا العيون - الريادة في طب العيون منذ2004 ',
               'sub_title' => 'أفضل مستشفى عيون في مصر والشرق الأوسط بأحدث التقنيات الطبية' ,
               'desc'      => 'مستشفى دنيا العيون تقدم خدمات طبية وجراحية شاملة في جميع
                                تخصصات طب العيون، مع فريق من الاستشاريين المتميزين وأحدث
                                الأجهزة العالمية. تأسست عام 2004 لتصبح الوجهة الأولى للعيون بمصر،
                                ملتزمون بتقديم أفضل رعاية طبية وفقاً لأعلى معايير الجودة والتعاون مع
                                التأمين الصحي والجمعيات الخيرية.'
             ],
            'en' => [
                'title'     => 'Dunia Al-Oyoun Hospital - A Leader in Ophthalmology Since 2004',
                'sub_title' => 'The Best Eye Hospital in Egypt and the Middle East with the Latest Medical Technologies',
                'desc'      => 'Dunia Al-Oyoun Hospital provides comprehensive medical and surgical services  
                    in all ophthalmology specialties, with a team of distinguished consultants and  
                    the latest global equipment. Established in 2004, it has become the leading  
                    eye care destination in Egypt, committed to delivering the best medical care  
                    according to the highest quality standards, in collaboration with health insurance  
                    and charitable organizations.'
]
        ]);
    }
}
