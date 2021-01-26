<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin12345'),
            'is_super'	=>  1,
        ];

        Admin::create($admin);
    }
}
