<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $rodrigo = SeedData::rodrigo();
        $rosana = SeedData::rosana();

        $categories = [
            'Alimentación',
            'Vivienda',
            'Transporte',
            'Salud',
            'Ocio',
            'Educación',
            'Mascotas',
            'Deporte',
            'Ropa',
            'Otros',
        ];

        foreach ($categories as $name) {
            Category::factory()
                ->for($rodrigo)
                ->create(['name' => $name]);
        }

        Category::factory()
            ->for($rosana)
            ->count(8)
            ->create();
    }
}
