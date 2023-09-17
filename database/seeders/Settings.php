<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Settings extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'icon' => 'template',
            'logo' => 'template',
            'title' => 'template',
            'phone' => 'template',
            'desc' => 'template',
            'copywrite' => 'template',
            'facebook' => 'template',
            'instagram' => 'template',
            'linkedin' => 'template',
            'twitter' => 'template',
            'keywords' => 'template',
        ]);
    }
}
