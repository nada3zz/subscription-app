<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '1234567890',
            'password' => bcrypt('password'),
        ]);
    }
}
