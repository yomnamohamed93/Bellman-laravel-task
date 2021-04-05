<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{

    public function run()
    {
        // AdminTableSeeder
        DB::table('admins')->insert([
            'name' => "Super Admin",
            'email' => "admin@admin.com",
            'password' => Hash::make('password'),
            'status' => 1,
            'super_admin' => 1,
        ]);

    }
}
