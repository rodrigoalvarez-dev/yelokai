<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\User;

final class SeedData
{
    public static function rodrigo(): User
    {
        return User::where('email', 'rodrigo@example.com')->firstOrFail();
    }

    public static function rosana(): User
    {
        return User::where('email', 'rosana@example.com')->firstOrFail();
    }

    public static function euro(): Currency
    {
        return Currency::fromCode('EUR');
    }
}
