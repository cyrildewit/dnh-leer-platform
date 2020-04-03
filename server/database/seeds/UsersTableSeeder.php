<?php

use Domain\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cyril = User::create([
            'name'              => 'Cyril de Wit',
            'email'             => 'cyril@example.com',
            'username'          => 'cyrildewit',
            'password'          => Hash::make('secret'),
            'email_verified_at' => now(),
        ]);

        $cyril->addMediaFromUrl('https://avatars1.githubusercontent.com/u/16477999')
            ->toMediaCollection('avatars');
    }
}
