<?php

namespace Database\Seeders;

use App\Models\Recurrence;
use App\Models\User;
use Illuminate\Database\Seeder;

class RecurrenceSeeder extends Seeder
{
    public function run(): void
    {
        $user = SeedData::rodrigo();

        $account = $user->accounts()
            ->where('name', 'Cuenta corriente')
            ->firstOrFail();

        $category = fn (string $name) => $user->categories()
            ->where('name', $name)
            ->firstOrFail();

        $group = $user->groups()->firstOrFail();

        // Salary
        Recurrence::factory()
            ->for($user)
            ->for($account)
            ->for($category('Otros'))
            ->create([
                'amount' => 1000,
                'description' => 'Salary',
                'frequency' => 'monthly',
                'type' => 'income',
                'starts_at' => now(),
            ]);

        // House tax
        Recurrence::factory()
            ->for($user)
            ->for($account)
            ->for($category('Vivienda'))
            ->create([
                'amount' => 500,
                'description' => 'IBI',
                'frequency' => 'yearly',
                'type' => 'expense',
                'starts_at' => now()->setDate(now()->year, 9, 1),
            ]);

        // Gym
        Recurrence::factory()
            ->for($user)
            ->for($account)
            ->for($category('Deporte'))
            ->create([
                'amount' => 30,
                'description' => 'Gym',
                'frequency' => 'monthly',
                'type' => 'expense',
                'starts_at' => now(),
            ]);

        // Shared expense
        Recurrence::factory()
            ->for($user)
            ->for($account)
            ->for($category('Educación'))
            ->for($group)
            ->create([
                'amount' => 500,
                'description' => 'School',
                'frequency' => 'monthly',
                'type' => 'expense',
                'starts_at' => now(),
            ]);
    }
}
