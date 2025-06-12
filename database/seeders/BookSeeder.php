<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Book,BookTopic};

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        BookTopic::create([
            'img' => 'programming.jpg',
            'ar'=>[
                'title' => 'برمجة',
                'desc' => 'استكشاف عالم البرمجة.'
            ],
            'en'=>[
                'title' => 'Programming',
                'desc' => 'Explore the world of programming.'
            ]
        ]);
       BookTopic::create([
            'img' => 'programming.jpg',
            'ar'=>[
                'title' => 'تصميم',
                'desc' => 'تعلم أساسيات ومبادئ التصميم.'
            ],
            'en'=>[
                'title' => 'Design',
                'desc' => 'Learn the basics and principles of design.'
            ]
        ]);


        Book::create([
            'topic_id' => 1,
            'img' => 'book1.jpg',
            'price' => 100,
            'pdf_price' => 50,
            'count' => 10,
            'en' => [
            'title' => 'Learn PHP',
            'desc' => 'A comprehensive guide to PHP programming.'
            ],
            'ar' => [
            'title' => 'تعلم PHP',
            'desc' => 'دليل شامل لبرمجة PHP.'
            ]
        ]);
        Book::create([
            'topic_id' => 1,
            'img' => 'book2.jpg',
            'price' => 120,
            'pdf_price' => 60,
            'count' => 5,
            'en' => [
                'title' => 'Mastering JavaScript',
                'desc' => 'An advanced guide to JavaScript programming.'
            ],
            'ar' => [
                'title' => 'إتقان JavaScript',
                'desc' => 'دليل متقدم لبرمجة JavaScript.'
            ]
        ]);

        Book::create([
            'topic_id' => 2,
            'img' => 'book3.jpg',
            'price' => 80,
            'pdf_price' => 40,
            'count' => 15,
            'en' => [
                'title' => 'Graphic Design Basics',
                'desc' => 'An introduction to graphic design principles.'
            ],
            'ar' => [
                'title' => 'أساسيات التصميم الجرافيكي',
                'desc' => 'مقدمة في مبادئ التصميم الجرافيكي.'
            ]
        ]);
        Book::create([
            'topic_id' => 2,
            'img' => 'book4.jpg',
            'price' => 90,
            'pdf_price' => 45,
            'count' => 8,
            'en' => [
                'title' => 'Web Design Essentials',
                'desc' => 'A guide to essential web design techniques.'
            ],
            'ar' => [
                'title' => 'أساسيات تصميم الويب',
                'desc' => 'دليل لتقنيات تصميم الويب الأساسية.'
            ]
        ]);
        Book::create([
            'topic_id' => 1,
            'img' => 'book5.jpg',
            'price' => 150,
            'pdf_price' => 75,
            'count' => 12,
            'en' => [
                'title' => 'Advanced Python Programming',
                'desc' => 'A deep dive into advanced Python concepts.'
            ],
            'ar' => [
                'title' => 'برمجة بايثون المتقدمة',
                'desc' => 'استكشاف مفاهيم بايثون المتقدمة.'
            ]
        ]);
        Book::create([
            'topic_id' => 2,
            'img' => 'book6.jpg',
            'price' => 110,
            'pdf_price' => 55,
            'count' => 7,
            'en' => [
                'title' => 'UI/UX Design Principles',
                'desc' => 'Understanding the principles of UI/UX design.'
            ],
            'ar' => [
                'title' => 'مبادئ تصميم واجهة المستخدم وتجربة المستخدم',
                'desc' => 'فهم مبادئ تصميم واجهة المستخدم وتجربة المستخدم.'
            ]
        ]); 
        Book::create([
            'topic_id' => 1,
            'img' => 'book7.jpg',
            'price' => 130,
            'pdf_price' => 65,
            'count' => 9,
            'en' => [
                'title' => 'Java Programming for Beginners',
                'desc' => 'A beginner\'s guide to Java programming.'
            ],
            'ar' => [
                'title' => 'برمجة جافا للمبتدئين',
                'desc' => 'دليل المبتدئين لبرمجة جافا.'
            ]
        ]);

    }
}
