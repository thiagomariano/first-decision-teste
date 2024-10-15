<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Thiago Mariano',
                'email' => 'thiago@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Maria Silva',
                'email' => 'maria@example.com',
                'password' => Hash::make('password456'),
            ],
            [
                'name' => 'João Santos',
                'email' => 'joao@example.com',
                'password' => Hash::make('password789'),
            ],
        ]);
    }
}
