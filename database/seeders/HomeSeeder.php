<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Seeder;
use DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('homes')->truncate();
        Home::create([
            'section_one_title' => 'Business Beyond Boundaries',
            'section_two_title' => 'Our Business Verticals',
            'section_three_title' => 'Our Story',
            'section_three_description' => '<p>Ever since its inception four decades ago, and reinforcing the ancestorial business arena, B3 grew into a conglomerate with different business entities.</p><p>As our business grows beyond boundaries, we continue to take extra efforts to ensure that it is not just the quality of our products that are continuously evolving for the better but our commitment for a better environment as well.</p>',
            'section_three_image' => 'frontend/images/Our-Story.jpg',
            'section_four_subtitle' => 'Let\'s Chat About Your Goals',
            'section_four_title' => 'We Are Here to Help You',
            'section_five_title' => 'Latest Blogs',
        ]);
    }
}
