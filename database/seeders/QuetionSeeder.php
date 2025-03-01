<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quetion;

class QuetionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Quetion::create([
            'ar'=>[
                'quetion'  =>  ' كيف يمكنني حجز موعد مع الطبيب؟',
                'answer'   =>  'يمكنك حجز موعد عبر الموقع أو التطبيق بسهولة باختيار القسم الطبي وتحديد الوقت المناسب لك... المزيد',
            ],
            'en' =>[
                'quetion'  =>  'How can I make an appointment with a doctor?',
                'answer'   =>  'You can easily book an appointment through the website or application by choosing the medical department and specifying the time that suits you...More',
            ]
        ]);


        Quetion::create([
            'ar'=>[
                'quetion'  => ' هل يمكنني تغيير موعد الحجز؟',
                'answer'   => 'نعم، يمكنك تغيير موعدك بسهولة من خلال حسابك أو عبر التواصل مع فريق الدعم الخاص بنا.'
            ],

            'en' =>[ 
                 'quetion'  => 'Can I change my booking date?',
                 'answer'   => 'Yes, you can easily change your appointment through your account or by contacting our support team'
            ]
        ]);

        Quetion::create([
            'ar'=>[
                'quetion'  => ' هل يوجد حجز مواعيد للعلاج الطارئ؟',
                'answer'   => 'ننعم، نقدم خدمات الحجز للحالات الطارئة في أقرب وقت ممكن لضمان تقديم العلاج العاجل. المزيد'
            ],

            'en' =>[ 
                 'quetion'  => 'Are there appointments for emergency treatment?',
                 'answer'   => 'Yes, we provide booking services for emergency cases as soon as possible to ensure urgent treatment. More'
            ]
        ]);

        Quetion::create([
            'ar'=>[
                'quetion'  => ' ما هي طرق الدفع المتاحة لحجز المواعيد؟',
                'answer'   => 'يمكنك الدفع عبر الإنترنت أو من خلال التحويل البنكي أو باستخدام تطبيقات الدفع مثل واتساب... المزيد'
            ],

            'en' =>[ 
                 'quetion'  => 'What payment methods are available to book appointments?',
                 'answer'   => 'You can pay online, through bank transfer, or using payment applications such as WhatsApp'
            ]
        ]);

        Quetion::create([
            'ar'=>[
                'quetion'  => ' هل يمكنني استشارة الطبيب عبر الإنترنت؟',
                'answer'   => 'نعم، نوفر خدمة الاستشارات الطبية عبر الإنترنت للراحة والخصوصية في أي وقت تحتاجه '
            ],

            'en' =>[ 
                 'quetion'  => 'Can I consult a doctor online?',
                 'answer'   => 'Yes, we provide online medical consultation service for convenience and privacy anytime you need'
            ]
        ]);

        Quetion::create([
            'ar'=>[
                'quetion'  => ' هل يتوفر خصم للمؤسسات أو النقابات؟',
                'answer'   => 'نعم، نقدم خصومات خاصة للمؤسسات والنقابات الطبية، يمكنكم التحقق من التفاصيل عبر فريق الدعم المزيد'
            ],

            'en' =>[ 
                 'quetion'  => 'Is there a discount for organizations or unions?',
                 'answer'   => 'Yes, we offer special discounts for medical institutions and unions. You can check the details through the support team.'
            ]
        ]);

    }
}
