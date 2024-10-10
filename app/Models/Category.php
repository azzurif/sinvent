<?php

namespace App\Models;

use App\Enums\CategoryEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'category',
        'description',
    ];

    protected function casts(): array
    {
        return [
            CategoryEnum::class,
        ];
    }

    // Relations
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
