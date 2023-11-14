<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Seed 5 usuarios con rol 'manager'
        User::factory(5)->create([
            'role' => 'manager',
            'password' => Hash::make('Monoma.07'), // ciframos la contraseña
        ]);

        // Seed 1 TESTER con rol 'manager'
        User::factory(1)->create([
            'username' => 'tester',
            'role' => 'manager',
            'password' => Hash::make('PASSWORD'), // ciframos la contraseña
        ]);

        // Seed 5 usuarios con rol 'agent'
        User::factory(5)->create([
            'role' => 'agent',
            'password' => Hash::make('Monoma.07'), // ciframos la contraseña
        ]);
    }
}