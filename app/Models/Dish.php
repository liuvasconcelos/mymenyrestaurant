<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dishes';
    protected $primaryKey = 'id_dish';

    public $fillable = [
        'name',
        'value',
        'description',
        'status'
    ];
}
