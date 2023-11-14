<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName,
            'password' => Hash::make('password'), // Puedes cambiar esto según tus requisitos
            'last_login' => now(),
            'is_active' => true,
            'role' => $this->faker->randomElement(['manager', 'agent']),
        ];
    }

    // Métodos para generar usuarios con roles específicos
    public function manager()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'manager',
            ];
        });
    }

    public function agent()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'agent',
            ];
        });
    }
}