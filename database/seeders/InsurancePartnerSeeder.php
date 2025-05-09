<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{InsurancePartnerInfo,InsurancePartner};

class InsurancePartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        InsurancePartnerInfo::create([
             'ar'  =>[
                  'title'     => 'شركاؤنا الموثوقون يعكسون التزامنا بتقديم أفضل الخدمات لعملائنا دائمًا',
                  'subtitle'  => 'شركاء التأمين: أسماء لامعة تقدم الدعم والخبرة لتعزيز خدماتنا',
                  'desc'      => 'تفخر شركتنا بشراكات استراتيجية مع جهات رائدة في مختلف الصناعات. هذه الشراكات تمثل أساس نجاحنا وتؤكد التزامنا بتقديم خدمات متفوقة تلبي توقعات عملائنا. استكشف معنا أبرز شركائنا الذين ساهموا في تحقيق رؤيتنا المشتركة والابتكار المستدام'
             ],
           'en' => [
                'title'    => 'Our trusted partners reflect our commitment to always providing the best services to our clients',
                'subtitle' => 'Insurance Partners: Renowned names offering support and expertise to enhance our services',
                'desc'     => 'Our company takes pride in strategic partnerships with leading entities across various industries. These partnerships form the foundation of our success and affirm our commitment to delivering superior services that meet our clients’ expectations. Discover our key partners who have contributed to achieving our shared vision and sustainable innovation.'
            ],
        ]);


            InsurancePartner::create([
                'ar' =>[
                    'title'=>'first partner'
                ],

                'en' =>[
                   'title'=>'first partner'
                ],
            ]);


            InsurancePartner::create([
                'ar' =>[
                    'title'=>'seconde partner'
                ],

                'en' =>[
                   'title'=>'seconde partner'
                ],
            ]);

            InsurancePartner::create([
                'ar' =>[
                    'title'=>'third partner'
                ],

                'en' =>[
                   'title'=>'third partner'
                ],
            ]);
    }
}
