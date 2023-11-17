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
        DB::table('statuss')->insert([
            'jenis' => 'active',
        ]);

        DB::table('statuss')->insert([
            'jenis' => 'inactive',
        ]);

        DB::table('statuss')->insert([
            'jenis' => 'terminated',
        ]);
    }
}
