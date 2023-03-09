<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Guest;
use App\Models\Invitation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Invitation::create([
            'recipient' => 'The Doe Family',
            'password' => 'password'
        ]);

        Guest::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'invitation_id' => 1
        ]);

        Guest::create([
            'firstname' => 'Jane',
            'lastname' => 'Doe',
            'invitation_id' => 1
        ]);
    }
}
