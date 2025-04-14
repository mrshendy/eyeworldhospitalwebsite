<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rate;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Rate::create([
            'user_name'  => 'mostafa saadoun',
            'comment'    =>'this very gode hospital',
            'rate'       =>4
        ]);


        Rate::create([
            'user_name'  => 'mohamed ahmed',
            'comment'    =>'geate job and doctors ',
            'rate'       =>4
        ]);


        Rate::create([
            'user_name'  => 'nada Ahmed salama',
            'comment'    =>'i am ver apreciate with  this service',
            'rate'       =>4
        ]);


        Rate::create([
            'user_name'  => 'mostafa saadoun',
            'comment'    =>'this very gode hospital',
            'rate'       =>4
        ]);


        Rate::create([
            'user_name'  => 'mohamed ahmed',
            'comment'    =>'geate job and doctors ',
            'rate'       =>4
        ]);


        Rate::create([
            'user_name'  => 'nada Ahmed salama',
            'comment'    =>'i am ver apreciate with  this service',
            'rate'       =>4
        ]);
    }
}
