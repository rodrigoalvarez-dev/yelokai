<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Category;
use App\Models\Recurrence;
use App\Models\User;
use App\Shared\RecurrenceFrequency;
use App\Shared\TransactionType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Recurrence>
 */
class RecurrenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => fake()->randomFloat(2, 1, 1000),
            'description' => fake()->sentence(),
            'frequency' => fake()->randomElement(RecurrenceFrequency::cases()),
            'type' => fake()->randomElement(TransactionType::cases()),
            'starts_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'ends_at' => fake()->optional()->dateTimeBetween('now', '+1 year'),
            'group_id' => null,
        ];
    }

    public function forUser(User $user): static
    {
        return $this->state(fn () => [
            'user_id' => $user->id,
            'category_id' => Category::factory()->for($user),
            'account_id' => Account::factory()->for($user),
        ]);
    }
}
