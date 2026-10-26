<?php

namespace App\Shared;

enum TransactionCertainty: string
{
    case Confirmed = 'confirmed';
    case Estimated = 'estimated';
}
