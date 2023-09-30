<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesPhotos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            ['img' => 'template', 'page' => 'ən son yüklənən filmlər səhvəsi'],
            ['img' => 'template', 'page' => 'kateqoriya üzrə filmlər səhvəsi'],
            ['img' => 'template', 'page' => 'seriallar səhvəsi'],
            ['img' => 'template', 'page' => 'əlaqə səhvəsi'],
            ['img' => 'template', 'page' => 'sənədli filmlər səhvəsi'],
            ['img' => 'template', 'page' => 'axtarış nəticəsi səhvəsi']

        ];
        foreach ($pages as $page) {
            DB::table('pages_photos')->insert([
                'img' => $page['img'],
                'page' => $page['page'],
            ]);
        }
    }
}
