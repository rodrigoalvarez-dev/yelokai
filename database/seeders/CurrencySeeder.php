<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::create([
            'name' => 'US Dollar',
            'symbol' => '$',
            'code' => 'USD',
        ]);

        Currency::create([
            'name' => 'Euro',
            'symbol' => '€',
            'code' => 'EUR',
        ]);

        Currency::create([
            'name' => 'British Pound',
            'symbol' => '£',
            'code' => 'GBP',
        ]);
    }
}
