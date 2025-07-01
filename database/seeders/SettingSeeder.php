<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::Create([
            'phone' => '01234567890',
            'secondary_phone' => '01234567890',
            'email' => 'info@eyeworldhospital.com',

            'ar' => [
                'title'     =>   '.مستشفى دنيا العيون هي الرائدة في تقديم خدمات طبية متكاملة ومتطورة لتلبية احتياجاتكم الصحية',
                'description'     =>   'مستشفى دنيا العيون هي وجهتك الأولى في مجال طب العيون، حيث نقدم خدمات متكاملة تبدأ من التشخيص الدقيق إلى العلاجات المتطورة. فريقنا يتكون من نخبة من الأطباء المتخصصين في كافة مجالات طب العيون، ويعملون باستخدام أحدث الأجهزة لتقديم أفضل رعاية صحية ممكنة لمرضانا.',
                'address'  =>   '12 مصدق، الدقي، الدقي، محافظة الجيزة 12611',
            ],

          'en' => [
                'title'    => 'Dunya Eye Hospital is a leader in providing comprehensive and advanced medical services to meet your healthcare needs.',
                'description'     => 'Dunya Al-Uloon Hospital is your top destination in the field of ophthalmology, offering comprehensive services from precise diagnosis to advanced treatments. Our team consists of elite specialists in all areas of eye care, utilizing the latest technology to provide the best possible healthcare for our patients.',
                'address' => '12 مصدق، الدقي، الدقي، محافظة الجيزة 12611',
            ],

         ]);
    }
}
