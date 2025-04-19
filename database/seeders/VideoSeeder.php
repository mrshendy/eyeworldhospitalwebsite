<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Video::create([
            'topic_id' =>1,
            'link'     =>'https://www.youtube.com/watch?v=jL0BXwnkx3g&list=RDbW3GMh5_m1c&index=10',
            'ar' => [
                'title' => 'نصائح للعناية اليومية بالعين',
                'desc'  => 'نصائح للعناية اليومية بالعين',
            ],
            'en' => [
                'title' => 'Daily Eye Care Tips'
            ]
        ]);
        
        Video::create([
            'topic_id' =>2,
            'link'     =>'https://www.youtube.com/watch?v=jL0BXwnkx3g&list=RDbW3GMh5_m1c&index=10',
            'ar' => [
                'title' => 'التغذيه وصحه العين',
                'desc'  => 'التغذيه وصحه العين',
            ],
            'en' => [
                'title' => 'Nutrition and Eye Health'
            ]
        ]);
        
        Video::create([
            'topic_id' =>3,
            'link'     =>'https://www.youtube.com/watch?v=jL0BXwnkx3g&list=RDbW3GMh5_m1c&index=10',
            'ar' => [
                'title' => 'امراض العيون الشائعه',
                'desc'  => 'التغذيه وصحه العين',
            ],
            'en' => [
                'title' => 'Common Eye Diseases',
                'desc'  => 'التغذيه وصحه العين',
            ]
        ]);


        Video::create([
            'topic_id' =>4,
            'link'     =>'https://www.youtube.com/watch?v=jL0BXwnkx3g&list=RDbW3GMh5_m1c&index=10',
            'ar' => [
                'title' => 'امراض العيون الشائعه',
                'desc'  => 'التغذيه وصحه العين',
            ],
            'en' => [
                'title' => 'Common Eye Diseases',
                'desc'  => 'التغذيه وصحه العين',
            ]
        ]);
        Video::create([
            'topic_id' =>4,
            'link'     =>'https://www.youtube.com/watch?v=jL0BXwnkx3g&list=RDbW3GMh5_m1c&index=10',
            'ar' => [
                'title' => 'امراض العيون الشائعه',
                'desc'  => 'التغذيه وصحه العين',
            ],
            'en' => [
                'title' => 'Common Eye Diseases',
                'desc'  => 'التغذيه وصحه العين',
            ]
        ]);


        Video::create([
            'topic_id' =>5,
            'link'     =>'https://www.youtube.com/watch?v=jL0BXwnkx3g&list=RDbW3GMh5_m1c&index=10',
            'ar' => [
                'title' => 'امراض العيون الشائعه',
                'desc'  => 'التغذيه وصحه العين',
            ],
            'en' => [
                'title' => 'Common Eye Diseases',
                'desc'  => 'التغذيه وصحه العين',
            ]
        ]);
        Video::create([
            'topic_id' =>5,
            'link'     =>'https://www.youtube.com/watch?v=jL0BXwnkx3g&list=RDbW3GMh5_m1c&index=10',
            'ar' => [
                'title' => 'امراض العيون الشائعه',
                'desc'  => 'التغذيه وصحه العين',
            ],
            'en' => [
                'title' => 'Common Eye Diseases',
                'desc'  => 'التغذيه وصحه العين',
            ]
        ]);
    }
}
