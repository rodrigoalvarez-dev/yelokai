<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Settlement;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Settlement>
 */
class SettlementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'from_user_id' => User::factory(),
            'to_user_id' => User::factory(),
            'group_id' => Group::factory(),
        ];
    }
}
