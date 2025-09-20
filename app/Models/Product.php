<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name','slug','description','price','image','stock','rating'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPriceRupiahAttribute()
    {
        if ($this->price === null) return 'Rp -';
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}
