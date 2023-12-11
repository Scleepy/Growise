<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'FullName' => 'Daniel',
            'Dob' => '2023-12-08',
            'Email' => 'daniel@gmail.com',
            'Address' => 'sunib',
            'PhoneNumber' => '085280076262',
            'Gender' => 'Male',
            'IsAdmin' => true,
            'Password' => '$2y$10$izN.0SxE8i9LETM8K9g0xePe494SBLZlZQ70YayGTh8l68GC2WgmW', //daniel12345
            'OWOAccountID' => '085280076262',
        ]);
    }
}
