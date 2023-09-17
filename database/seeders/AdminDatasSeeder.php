<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminDatasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        function hashParola($parola)
        {
            return hash('sha256', $parola);
        }


        DB::table('admins')->insert([
            'name' => 'Məqsəd',
            'surname' => 'Bağırov',
            'login' => 'admin',
            'password' => hashParola('123456'),
            'status' => 1
        ]);
    }
}
