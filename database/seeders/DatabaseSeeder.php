<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            DaySeeder::class,
            CountrySeeder::class,
            QuetionSeeder::class,
            AboutSeeder::class,
            SpecialtieSeeder::class,
            AdminSeeder::class,
            EyeInfoSeeder::class,
            ArticleSeeder::class,
            EyeHealthVideoSeeder::class,
            CustomerVideoInfoSeeder::class,
            CustomerRateInfoSeeder::class,
            RateSeeder::class,
            RightInfoSeeder::class,
            RightSeeder::class,
            InsurancePartnerSeeder::class,
            TopicSeeder::class,
            VideoSeeder::class,
            SocialMediaSeeder::class,
            TeamInfoSeeder::class,
            MedicalDeviceInfoSeeder::class,
            MedicalTourismInfoSeeder::class,
            ConferenceInfoSeeder::class,
<<<<<<< HEAD
            BookSeeder::class,
=======
            BookInfoSeeder::class,
>>>>>>> 5ed3c6dd9272167e07f8c62ed5c4f3a3aaff4338
        ]);
    }
}
