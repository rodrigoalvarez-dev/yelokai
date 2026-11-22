<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use App\Shared\TransactionCertainty;
use App\Shared\TransactionStatus;
use App\Shared\TransactionType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
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
            'date' => fake()->dateTimeBetween('-1 year'),
            'type' => fake()->randomElement(TransactionType::cases()),
            'status' => fake()->randomElement(TransactionStatus::cases()),
            'certainty' => fake()->randomElement(TransactionCertainty::cases()),
            'group_id' => null,
            'recurrence_id' => null,
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
