<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDrink extends Model
{
    protected $table = 'order_drinks';
    protected $primaryKey = 'id_order_drink';

    public $fillable = [
        'id_order',
        'id_drink_added'
    ];

    public function orderFK()
    {
        return $this->hasMany(Order::class, 'id_order', 'id_order');
    }

    public function drinkAddedFK()
    {
        return $this->hasMany(Product::class, 'id_product', 'id_drink_added');
    }
}
