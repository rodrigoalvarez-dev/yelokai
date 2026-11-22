<?php

namespace Database\Seeders;

use App\Models\Recurrence;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $rodrigo = SeedData::rodrigo();
        $rosana = SeedData::rosana();
        $group = $rodrigo->groups()->firstOrFail();

        // Transactions generated from recurrences
        $recurrences = Recurrence::query()->get();

        foreach ($recurrences as $recurrence) {
            Transaction::factory()
                ->for($recurrence->user)
                ->for($recurrence->account)
                ->for($recurrence->category)
                ->for($recurrence)
                ->create([
                    'amount' => $recurrence->amount,
                    'description' => $recurrence->description,
                    'date' => now()->startOfMonth(),
                    'type' => $recurrence->type,
                    'status' => 'completed',
                    'certainty' => 'confirmed',
                    'group_id' => $recurrence->group_id,
                ]);
        }

        // Personal transactions
        $this->createTransaction($rodrigo, 'Alimentación', 45.50, 'Compra supermercado');
        $this->createTransaction($rodrigo, 'Transporte', 35, 'Gasolina');
        $this->createTransaction($rodrigo, 'Mascotas', 28.90, 'Comida para mascotas');

        $this->createTransaction($rosana, 'Food', 62.30, 'Compra supermercado');

        // Shared expenses
        $this->createTransaction(
            $rodrigo,
            'Educación',
            80,
            'Material escolar',
            $group->id
        );

        $this->createTransaction(
            $rosana,
            'Food',
            120,
            'Compra compartida',
            $group->id
        );
    }

    private function createTransaction(
        User $user,
        string $categoryName,
        float $amount,
        string $description,
        ?int $groupId = null
    ): void {
        $account = $user->accounts()->firstOrFail();
        $category = $user->categories()
            ->where('name', $categoryName)
            ->firstOrFail();

        Transaction::factory()
            ->for($user)
            ->for($account)
            ->for($category)
            ->create([
                'amount' => $amount,
                'description' => $description,
                'date' => now(),
                'type' => 'expense',
                'status' => 'completed',
                'certainty' => 'confirmed',
                'group_id' => $groupId,
            ]);
    }
}
