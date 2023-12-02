<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            'StatusName' => 'Processing'
        ]);
        DB::table('statuses')->insert([
            'StatusName' => 'Delivering'
        ]);
        DB::table('statuses')->insert([
            'StatusName' => 'Delivered'
        ]);
    }
}
