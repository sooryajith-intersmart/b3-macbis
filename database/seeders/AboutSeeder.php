<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->truncate();
        About::create([
            'title' => 'Our Story',
            'description' => '<p>Ever since its inception four decades ago, and reinforcing the ancestorial business arena, B3 grew into a conglomerate with different business entities. As our business grows beyond boundaries, we continue to take extra efforts to ensure that it is not just the quality of our products that are continuously evolving for the better but our commitment for a better environment as well.</p><p>With state-of-the-art manufacturing and corporate facilities in Bengaluru and Kochi, we are acknowledged for our dedication to maintain the quality and durability of products. The foresight and vision of our robust team has been responsible for driving the company forward with technological innovations, which has helped us leverage a strong market share. Our fully automated manufacturing facility is equipped with ultra-modern machinery and technology to form the heart of our thriving business operations. With a strong focus on sustainable development and minimizing environmental impact, B3 has adopted green practices such as solar energy, recycling and efficient waste management - which has considerably reduced dependence on conventional energy sources at our manufacturing facilities and offices. With thriving green eco-systems located near our facilities, extra care is taken to ensure that any kind of effluence or pollution, which may adversely affect the fragile environment is not generated and there by reducing the carbon footprint.</p>',
            'image' => 'frontend/images/Our-Story.jpg',
        ]);
    }
}