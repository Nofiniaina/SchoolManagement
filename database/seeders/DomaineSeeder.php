<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomaineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $domaines = [
            ['name' => 'Sciences de la société'],
            ['name' => 'Sciences et technologies'],
            ['name' => 'Sciences de l\'ingénieur'],
            ['name' => 'Sciences de l\'éducation'],
            ['name' => 'Arts, lettres et sciences humaines'],
            ['name' => 'Sciences de la santé']
        ];
        
        DB::table('domaines')->insert($domaines);
    }
}
