<?php

namespace Database\Seeders;

use App\Models\MetaTag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class MetaTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('meta_tags')->truncate();
        $data = [
            [
                'page'                  => 'home',
                'meta_title'            => 'Home',
                'meta_description'      => 'Home',
                'meta_keywords'         => 'Home',
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now()
            ],
            [
                'page'                  => 'about',
                'meta_title'            => 'About',
                'meta_description'      => 'About',
                'meta_keywords'         => 'About',
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now()
            ],
            [
                'page'                  => 'blogs',
                'meta_title'            => 'Blogs',
                'meta_description'      => 'Blogs',
                'meta_keywords'         => 'Blogs',
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now()
            ],
            [
                'page'                  => 'contact',
                'meta_title'            => 'Contact',
                'meta_description'      => 'Contact',
                'meta_keywords'         => 'Contact',
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now()
            ],
        ];

        MetaTag::insert($data);
    }
}
