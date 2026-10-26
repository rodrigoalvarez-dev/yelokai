<?php

namespace App\Models;

use Database\Factories\CurrencyFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 *
 * @property int $id
 */
#[Fillable(['name', 'symbol', 'code', 'is_active'])]
#[Table('currencies')]
class Currency extends Model
{
    /** @use HasFactory<CurrencyFactory> */
    use HasFactory;

    public function id(): int
    {
        return $this->id;
    }

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public static function fromCode(string $code): self
    {
        return static::where('code', $code)->firstOrFail();
    }
}
