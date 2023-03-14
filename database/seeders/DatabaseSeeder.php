<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Guest;
use App\Models\Invitation;
use App\Models\User;
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
            'access_code' => 'code1'
        ]);

        Invitation::create([
            'recipient' => 'The Smith Family',
            'access_code' => 'code2'
        ]);

        Invitation::create([
            'recipient' => 'Darth Vader',
            'access_code' => 'thedarkside'
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

        Guest::create([
            'firstname' => 'Sam',
            'lastname' => 'Smith',
            'invitation_id' => 2
        ]);

        Guest::create([
            'firstname' => 'Sally',
            'lastname' => 'Smith',
            'invitation_id' => 2
        ]);

        Guest::create([
            'firstname' => 'Anakin',
            'lastname' => 'Skywalker',
            'invitation_id' => 3
        ]);

        // default admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin')
        ]);
    }
}
