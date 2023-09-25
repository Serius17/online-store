<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FlashSale extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
