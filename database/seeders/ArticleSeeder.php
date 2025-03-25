<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Article::create([
            'ar' => [
               'title' => 'أهمية الفحص المبكر للعيون',
               'desc' => 'يساعد في اكتشاف مشاكل العين مثل الأورام والأمراض المختلفة في مراحلها الأولى، ما يسهل ويزيد من فرص الشفاء',
               'article' => '',
            ],

            'en' => [
                'title' => '',
                'desc' => '',
                'article' => '',
             ],

        ]);


        Article::create([
            'ar' => [
                'title' => 'طرق للحفاظ على صحة العين',
                'article' => 'من خلال اتباع نظام غذائي صحي، والحفاظ على الراحة، وارتداء النظارات الواقية أثناء التعرض للأشعة أو الغبار',
                'desc' => ''
            ],

            'en' => [
                'title' => '',
                'desc' => '',
                'article' => '',
             ],

        ]);


        Article::create([
            'ar' => [
                'title' => 'دور التغذية في صحة العين',
                'desc' => 'الأطعمة الغنية بفيتامين A مثل الجزر والخضروات الورقية مهمة للحفاظ على صحة الشبكية والوقاية من الأمراض',
                'article' => ''
            ],

            'en' => [
                'title' => '',
                'desc' => '',
                'article' => '',
             ],

        ]);
    }
}
