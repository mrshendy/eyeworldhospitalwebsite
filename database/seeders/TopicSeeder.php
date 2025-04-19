<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Topic::create([
            'ar' => [
                'title' => 'نصائح للعناية اليومية بالعين'
            ],
            'en' => [
                'title' => 'Daily Eye Care Tips'
            ]
        ]);
        
        Topic::create([
            'ar' => [
                'title' => 'التغذيه وصحه العين'
            ],
            'en' => [
                'title' => 'Nutrition and Eye Health'
            ]
        ]);
        
        Topic::create([
            'ar' => [
                'title' => 'امراض العيون الشائعه'
            ],
            'en' => [
                'title' => 'Common Eye Diseases'
            ]
        ]);



        Topic::create([
            'type' => 'experiments',
            'ar' => [
                'title' => 'مشاكل البصر وضعف الابصار '
            ],
            'en' => [
                'title' => 'Nutrition and Eye Health'
            ]
        ]);
        
        Topic::create([
            'type' => 'experiments',
            'ar' => [
                'title' => 'التهابات العين المزمنه '
            ],
            'en' => [
                'title' => 'Common Eye Diseases'
            ]
        ]);
    }
}
