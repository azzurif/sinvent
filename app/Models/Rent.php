<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Rent extends Model
{
    /** @use HasFactory<\Database\Factories\RentFactory> */
    use HasFactory;

    protected $fillable = [
        'out_date',
        'in_date',
        'qnt'
    ];

    protected function casts()
    {
        return [
            'out_date' => 'datetime:Y-m-d H:i:s',
            'in_date' => 'datetime:Y-m-d H:i:s'
        ];
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class)->withPivot('qnt');
    }
}
