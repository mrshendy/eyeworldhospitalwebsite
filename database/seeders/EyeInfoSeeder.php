<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EyeHealthInfo;

class EyeInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        EyeHealthInfo::Create([
         
           'ar' => [
                'title'     =>   'تعرف على أهم المعلومات التي تساهم في الحفاظ على صحة عينك',
                'subtitle'  =>   'اكتشف أهم المعلومات التي تساهم في الحفاظ على صحة عينك وعلاج الأورام بطريقة فعّالة ومهنية',
                'desc'     =>   'صحة عينيك هي جزء أساسي من جودة حياتك. في هذا القسم، نقدم لك مجموعة من المعلومات المهمة التي تساعدك على فهم أفضل لطرق الوقاية والعلاج المتقدمة لأورام العين. هذه المعلومات تمثل خطوة نحو حياة صحية أكثر وعيًا بما يتعلق بصحة عينيك.',
                'detail_title'  =>   'حافظ على صحة عينيك من خلال الفحص المبكر وتجنب المشاكل المستقبلية',
                'detail_subtitle' => 'أهمية الفحص المبكر للعيون وكيفية الوقاية من الأمراض البصرية المختلفة',
                'detail_desc'   =>'الفحص المبكر هو خطوة هامة للحفاظ على صحة عينيك. اكتشاف المشاكل في مراحلها المبكرة يسهل العلاج ويوفر لك فرصة أفضل للشفاء. من خلال هذه الخدمة، نساعدك في اكتشاف مشاكل العين مثل الأورام والأمراض في وقت مبكر.'
           ],

          'en' => [
                'title'     => 'Discover the Most Important Information to Maintain Your Eye Health',
                'subtitle'  => 'Learn about essential information that helps preserve your eye health and treat tumors effectively and professionally',
                'desc'      => 'Your eye health is an essential part of your quality of life. In this section, we provide you with a collection of important information to help you better understand advanced methods of eye tumor prevention and treatment. This knowledge is a step towards a healthier life with greater awareness of your eye health.',
                'detail_title'  => 'Maintain Your Eye Health Through Early Detection and Prevent Future Problems',
                'detail_subtitle' => 'The Importance of Early Eye Exams and How to Prevent Various Vision Diseases',
                'detail_desc'   => 'Early detection is a crucial step in maintaining your eye health. Identifying problems in their early stages makes treatment easier and gives you a better chance of recovery. Through this service, we help you detect eye issues such as tumors and diseases at an early stage.'
            ]
        ]);
    }
}
