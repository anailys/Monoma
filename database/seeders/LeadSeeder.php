<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\LeadFactory;
use App\Models\Lead;
use App\Models\User;

class LeadSeeder extends Seeder
{
    public function run()
    {
        $managers = User::where('role', 'manager')->pluck('id');
        $agents = User::where('role', 'agent')->pluck('id');

        // Seed 5 candidatos asignados a managers
        Lead::factory(5)->create([
            'owner' => $managers->random(),
            'created_by' => $managers->random(),
        ]);

        // Seed 5 candidatos asignados a agents
        Lead::factory(5)->create([
            'owner' => $agents->random(),
            'created_by' => $agents->random(),
        ]);
    }
}