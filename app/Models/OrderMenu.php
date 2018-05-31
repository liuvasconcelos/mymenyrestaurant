<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderMenu extends Model
{
    protected $table = 'order_menus';
    protected $primaryKey = 'id_order_menu';

    public $fillable = [
        'id_order',
        'id_menu_added'
    ];

    public function orderFK()
    {
        return $this->hasMany(Order::class, 'id_order', 'id_order');
    }

    public function drinkAddedFK()
    {
        return $this->hasMany(Menu::class, 'id_menu', 'id_menu_added');
    }
}
