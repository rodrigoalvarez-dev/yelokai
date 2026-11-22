<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Rodrigo',
            'email' => 'rodrigo@example.com',
            'currency_id' => Currency::fromCode('EUR')->id(),
        ]);

        User::factory()->create([
            'name' => 'Rosana',
            'email' => 'rosana@example.com',
            'currency_id' => Currency::fromCode('EUR')->id(),
        ]);
    }
}
