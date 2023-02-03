<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            'name' => 'Админ',
            'email' => 'zikirait@admin.com',
            'password' => Hash::make('zikir123'),
            'is_admin' => 1
        );
        DB::table('users')->updateOrInsert($data);

    }
}
