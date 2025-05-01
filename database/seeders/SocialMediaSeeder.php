<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SocialMedia;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SocialMedia::create([
                 'img' => 'facebook.svg',
                 'url' => 'https://www.facebook.com/?locale=ar_AR',
                 'name' => 'facebook',
        ]);

        SocialMedia::create([
            'img' => 'instagram.svg',
            'url' => 'https://www.facebook.com/?locale=ar_AR',
            'name' => 'instagram',
        ]);


        SocialMedia::create([
            'img' => 'twitter.svg',
            'url' => 'https://www.facebook.com/?locale=ar_AR',
            'name' => 'twitter',
        ]);

        SocialMedia::create([
            'img' => 'snap.svg',
            'url' => 'https://www.facebook.com/?locale=ar_AR',
            'name' => 'snap',
        ]);

        SocialMedia::create([
            'img' => 'youtube.svg',
            'url' => 'https://www.facebook.com/?locale=ar_AR',
            'name' => 'youtube',
        ]);

    }
}
