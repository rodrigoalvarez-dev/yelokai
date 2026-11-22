<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\TransactionSplit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TransactionSplit>
 */
class TransactionSplitFactory extends Factory
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
            'user_id' => User::factory(),
            'transaction_id' => Transaction::factory(),
        ];
    }
}
