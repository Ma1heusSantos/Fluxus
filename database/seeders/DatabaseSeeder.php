<?php

namespace Database\Seeders;

use App\Models\Desk;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Desk::factory()->count(2)->create();

        User::factory()->create([
            'name' => 'teste',
            'email' => 'admin@admin',
            'password'=>'1234'
        ]);
    }
}