<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AboutSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(HomeSeeder::class);
        $this->call(MetaTagSeeder::class);
        $this->call(PageBannerSeeder::class);
        $this->call(ThemeSettingsSeeder::class);
    }
}
