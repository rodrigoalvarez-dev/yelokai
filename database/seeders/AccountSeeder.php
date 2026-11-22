<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    public function run(): void
    {
        $rodrigo = SeedData::rodrigo();
        $rosana = SeedData::rosana();
        $currency = SeedData::euro();

        foreach (['Cuenta corriente', 'Ahorros'] as $name) {
            Account::factory()
                ->for($rodrigo)
                ->for($currency)
                ->create(['name' => $name]);
        }

        Account::factory()
            ->for($rosana)
            ->for($currency)
            ->count(2)
            ->create();
    }
}
