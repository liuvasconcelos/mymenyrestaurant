<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id_product';

    public $fillable = [
        'type',
        'name',
        'value',
        'status'
    ];
}
