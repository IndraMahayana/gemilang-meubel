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
        if (is_null($this->price)) {
            return 'Rp -';
        }

        $price = is_numeric($this->price) ? (int) floor((float) $this->price) : 0;

        return 'Rp ' . number_format($price, 0, ',', '.');
    }
}
