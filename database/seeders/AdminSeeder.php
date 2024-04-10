<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@b3macbis.com',
            'password'  => hash::make('E$!_x2Q1z35A'),
        ]);
    }
}
