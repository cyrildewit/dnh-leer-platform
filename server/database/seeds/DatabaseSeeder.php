<?php

use Illuminate\Database\Seeder;

use Domain\User\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Cyril de Wit',
            'email' => 'cyril@example.com',
            'username' => 'cyrildewit',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
        ]);
    }
}
