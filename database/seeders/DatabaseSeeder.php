<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(4)->create();

        \App\Models\User::factory()->create([
                'name' => 'Alfasoft',
                'email' => 'test@alfasoft.com',
            ]);

        \App\Models\Contact::factory(10)->create();
    }
}
