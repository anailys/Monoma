<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lead;
use App\Models\User;

class LeadFactory extends Factory
{
    protected $model = Lead::class;

    public function definition()
    {
        $managers = User::where('role', 'manager')->pluck('id');
        $agents = User::where('role', 'agent')->pluck('id');

        return [
            'name' => $this->faker->sentence,
            'source' => $this->faker->word,
            'owner' => $this->faker->randomElement($agents),
            'created_by' => $this->faker->randomElement($managers),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}