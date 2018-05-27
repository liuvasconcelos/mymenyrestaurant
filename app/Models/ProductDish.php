<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDish extends Model
{
    protected $table = 'product_dishes';
    protected $primaryKey = 'id_product_dish';

    public $fillable = [
        'id_product',
        'id_dish'
    ];

    public function productFK()
    {
        return $this->hasMany(Product::class, 'id_product', 'id_product');
    }

    public function dishFK()
    {
        return $this->hasMany(Dish::class, 'id_dish', 'id_dish');
    }
}
