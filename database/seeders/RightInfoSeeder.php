<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RightInfo;

class RightInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        RightInfo::Create([
         
            'ar' => [
                 'title'    =>'حماية حقوق المرضى وتوضيح واجباتهم لضمان تجربة علاجية مثالية للجميع',
                 'subtitle' => 'حقوقك وواجباتك: ميثاق متوازن لضمان أفضل رعاية طبية متكاملة',
                 'desc'     => 'نلتزم بتوفير بيئة صحية تدعم حقوق المرضى وتحثهم على الالتزام بواجباتهم لضمان تقديم الرعاية المثالية. هذا الميثاق يعزز التعاون بين المرضى ومقدمي الخدمات الصحية لتحقيق تجربة علاجية متكاملة وآمنة للجميع.'
                 
            ],
 
            'en' => [
                    'title'    => 'Protecting patients’ rights and clarifying their responsibilities to ensure an ideal treatment experience for everyone',
                    'subtitle' => 'Your rights and responsibilities: A balanced charter to ensure the best comprehensive medical care',
                    'desc'     => 'We are committed to providing a healthy environment that supports patients’ rights and encourages them to fulfill their responsibilities to ensure optimal care. This charter promotes collaboration between patients and healthcare providers to achieve a safe and comprehensive treatment experience for all.',
                ],

         ]);
    }
}
