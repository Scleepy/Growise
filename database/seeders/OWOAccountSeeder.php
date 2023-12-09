<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OWOAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        //Generate random ID (12 digits)
        //str_pad(mt_rand(1, 999999999999), 12, '0', STR_PAD_LEFT)
        DB::table('o_w_o_accounts')->insert([
            'id' => "085280076262",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
