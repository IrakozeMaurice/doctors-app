<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DoctorUser;
use Illuminate\Support\Facades\Hash;

class DoctorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create doctor user
        DoctorUser::insert([
            [
                'name' => 'doctor user',
                'email' => 'doctor@example.com',
                'password' => Hash::make('aaaaaaaa'), // aaaaaaaa
            ]
        ]);
    }
}
