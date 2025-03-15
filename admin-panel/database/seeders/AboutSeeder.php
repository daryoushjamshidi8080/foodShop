<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        AboutUs::create([
            'title' => 'لورم ایپسوم متن',
            'body' => '. چاپگرهاناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت',
            'link' => '#',
        ]);
    }
}
