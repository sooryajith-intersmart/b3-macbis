<?php

namespace Database\Seeders;

use App\Models\ThemeSettings;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('theme_settings')->truncate();
        $data = [
            [
                'key'           => 'website_name',
                'value'         => 'B3 Macbis',
                'type'          => 0,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'key'           => 'website_logo',
                'value'         => 'backend/img/logo.png',
                'type'          => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'key'           => 'website_logo_black',
                'value'         => 'backend/img/logo-black.png',
                'type'          => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'key'           => 'website_favicon',
                'value'         => 'backend/img/favicon.ico',
                'type'          => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'key'           => 'default_image',
                'value'         => 'backend/img/default-image.png',
                'type'          => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'key'           => 'website_primary_color',
                'value'         => '#1d1926',
                'type'          => 2,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'key'           => 'website_secondary_color',
                'value'         => '#c2c7d0',
                'type'          => 2,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'key'           => 'website_tertiary_color',
                'value'         => '#d0332c',
                'type'          => 2,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
        ];

        ThemeSettings::insert($data);
    }
}
