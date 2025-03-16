<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Footer::create([
            'contact_address' => 'آدرس شعبه',
            'contact_phone' => '+989033671408',
            'contact_email' => 'daryoushjamshidi80@gmail.com',
            'title' => 'FoodShop',
            'body' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.',
            'work_days' => 'هرروز',
            'work_hour_from' => '10:00',
            'work_hour_to' => '12:00',
            'copyright' => 'لورم ایپسوم متن ساختگی با تولید سادگی',

        ]);
    }
}
