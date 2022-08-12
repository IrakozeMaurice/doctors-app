<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create admin user
        AdminUser::insert([
            [
                'name' => 'admin user',
                'email' => 'admin@admin.com',
                'password' => Hash::make('aaaaaaaa'), // aaaaaaaa
            ]
        ]);
    }
}
