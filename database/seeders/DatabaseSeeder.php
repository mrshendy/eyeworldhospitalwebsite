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
            InsurancePartnerSeeder::class
        ]);
    }
}
