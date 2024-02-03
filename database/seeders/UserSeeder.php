<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Users::create([
            'CategoryId' => '1',
            'FirstName' => 'John',
            'LastName' => 'Doe',
            'Email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
