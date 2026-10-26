<?php

namespace App\Shared;

enum TransactionType: string
{
    case Income = 'income';
    case Expense = 'expense';
}
