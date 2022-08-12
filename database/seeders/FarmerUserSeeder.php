<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FarmerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create farmer user
        User::insert([
            [
                'firstname' => 'farmer1',
                'lastname' => 'user',
                'phone' => '0788555555',
                'email' => 'farmer@example.com',
                'password' => Hash::make('aaaaaaaa'), // aaaaaaaa
            ]
        ]);
    }
}
