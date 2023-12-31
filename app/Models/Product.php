<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'sku',
        'name',
        'price',
        'stock',
        'image',
    ];

    public function getSubtotal($quantity)
    {
        return $this->price * $quantity;
    }
}
