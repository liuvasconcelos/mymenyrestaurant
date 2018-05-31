<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDish extends Model
{
    protected $table = 'order_dishes';
    protected $primaryKey = 'id_order_dish';

    public $fillable = [
        'id_order',
        'id_dish_added'
    ];

    public function orderFK()
    {
        return $this->hasMany(Order::class, 'id_order', 'id_order');
    }

    public function drinkAddedFK()
    {
        return $this->hasMany(Dish::class, 'id_dish', 'id_dish_added');
    }
}
