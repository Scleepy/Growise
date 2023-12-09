<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\OWOAccount;

class OWOAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        //Generate random ID (12 digits)
        //str_pad(mt_rand(1, 999999999999), 12, '0', STR_PAD_LEFT)

        OWOAccount::create([
            'id' => "000000000000",
        ]);

        OWOAccount::create([
            'id' => "085280076262",
            'Balance' => "1500000",
        ]);

        OWOAccount::create([
            'id' => "081283762959",
        ]);
    }
}
