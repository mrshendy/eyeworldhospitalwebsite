<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EyeHealthVideo;


class EyeHealthVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        EyeHealthVideo::Create([
         
            'ar' => [
                 'title'     =>   'تعلم كيف تحافظ على صحة عينيك بسهولة من خلال مجموعة فيديوهات تعليمية',
                 'subtitle'  =>   'مجموعة متكاملة من الفيديوهات التوعوية عن صحة العين والعناية السليمة بها',
                 'desc'     =>   'استمتع بمكتبة فيديوهات متخصصة تقدم معلومات موثوقة حول صحة العين، الوقاية من الأمراض، وأفضل الطرق للعناية بها. الفيديوهات مقدمة من خبراء في طب العيون لتساعدك على فهم مشكلات العين الشائعة وكيفية التعامل معها بفعالية.',
                 
            ],
 
          'en' => [
                'title'    => 'Learn how to maintain your eye health easily through a collection of educational videos',
                'subtitle' => 'A comprehensive collection of awareness videos about eye health and proper eye care',
                'desc'     => 'Enjoy a specialized video library that provides reliable information on eye health, disease prevention, and the best ways to care for your eyes. The videos are presented by ophthalmology experts to help you understand common eye problems and how to deal with them effectively.',
            ],

         ]);
    }
}
