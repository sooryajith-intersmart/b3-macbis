<?php

namespace Database\Seeders;

use App\Models\PageBanner;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class PageBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('page_banners')->truncate();
        $data = [
            [
                'page' => 'about',
                'subtitle' => 'Let\'s Innovate Together for a',
                'title' => 'Business Beyond Boundaries',
                'image' => 'frontend/images/banner-about01.png',
                'image_alt_text' => 'About',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'blogs',
                'subtitle' => 'Let\'s Innovate Together for a',
                'title' => 'Business Beyond Boundaries',
                'image' => 'frontend/images/banner-blog.png',
                'image_alt_text' => 'Blogs',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'contact',
                'subtitle' => 'Let\'s Innovate Together for a',
                'title' => 'Business Beyond Boundaries',
                'image' => 'frontend/images/banner-contact.jpg',
                'image_alt_text' => 'Contact',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        PageBanner::insert($data);
    }
}