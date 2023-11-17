<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelamins')->insert([
            'jenis' => 'Perempuan',
        ]);

        DB::table('kelamins')->insert([
            'jenis' => 'Laki Laki',
        ]);
    }
}
