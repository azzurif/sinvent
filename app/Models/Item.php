<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'brand',
        'specification',
        'qnt',
    ];

    // Realtions
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
