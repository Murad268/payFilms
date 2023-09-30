<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Adver extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            ['banner' => 'template', 'link' => 'template', 'status' => 1, 'place' => 'ana səhifə fixed reklamı'],
            ['banner' => 'template', 'link' => 'template', 'status' => 1, 'place' => 'ən son yüklənən filmlər səhifəsində reklam'],
            ['banner' => 'template', 'link' => 'template', 'status' => 1, 'place' => 'seriallar səhifəsi reklamı'],
            ['banner' => 'template', 'link' => 'template', 'status' => 1, 'place' => 'sənədli filmlər səhifəsi çox sezonlu sənədli filmlər reklamı'],
            ['banner' => 'template', 'link' => 'template', 'status' => 1, 'place' => 'sənədli filmlər səhifəsi tək sezonlu sənədli filmlər reklamı'],
            ['banner' => 'template', 'link' => 'template', 'status' => 1, 'place' => 'keteqoriya əsaslı filmlər səhifəsi - filmlər bölməsi reklamı'],
            ['banner' => 'template', 'link' => 'template', 'status' => 1, 'place' => 'keteqoriya əsaslı filmlər səhifəsi - seriallar bölməsi reklamı'],
            ['banner' => 'template', 'link' => 'template', 'status' => 1, 'place' => 'keteqoriya əsaslı filmlər səhifəsi - sənədli filmlər bölməsi reklamı'],
            ['banner' => 'template', 'link' => 'template', 'status' => 1, 'place' => 'keteqoriya əsaslı filmlər səhifəsi - bir sezonlu sənədli filmlər bölməsi'],
            ['banner' => 'template', 'link' => 'template', 'status' => 1, 'place' => 'footer reklamı'],
        ];
        foreach ($pages as $page) {
            DB::table('advertaisment')->insert([
                'banner' => $page['banner'],
                'link' => $page['link'],
                'place' => $page['place'],
                'status' => $page['status'],
            ]);
        }
    }
}
