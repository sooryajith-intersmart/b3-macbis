<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->truncate();
        Contact::create([
            'registered_address' => 'B3 Macbis Ltd, 28/330, Plot No:39, Girinagar, Kochi - 682020, Kerala',
            'registered_address_map_link' => '#',
            'head_office_address' => 'B3 Macbis Ltd, HIG - 35, 10th Cross Road, Panampilly Nagar, Kochi - 682036, Kerala',
            'head_office_address_map_link' => '#',
            'phone' => '+91 94977 18752',
            'email' => 'info@b3group.co.in',
            'facebook_link' => '#',
            'instagram_link' => '#',
            'twitter_link' => '#',
            'linkedin_link' => '#',
            'pinterest_link' => '#',
            'youtube_link' => '#',
            'map_link' => null,
        ]);
    }
}
