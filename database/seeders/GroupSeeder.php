<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rodrigo = SeedData::rodrigo();
        $rosana = SeedData::rosana();

        Group::factory()
            ->hasAttached([$rodrigo, $rosana])
            ->create([
                'name' => 'Gastos compartidos',
            ]);
    }
}
