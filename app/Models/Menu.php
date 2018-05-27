<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $primaryKey = 'id_menu';

    public $fillable = [
        'id_starter',
        'id_main_course',
        'id_dessert',
        'status'
    ];

    public function starterFK()
    {
        return $this->hasMany(Dish::class, 'id_dish', 'id_starter');
    }

    public function mainCourseFK()
    {
        return $this->hasMany(Dish::class, 'id_dish', 'id_main_course');
    }

    public function dessertFK()
    {
        return $this->hasMany(Dish::class, 'id_dish', 'id_dessert');
    }

}
