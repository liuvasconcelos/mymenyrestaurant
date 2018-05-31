<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id_order';

    public $fillable = [
        'table_number',
        'quantity_of_clients',
        'id_waiter',
        'value',
        'validation_code'
    ];

    public function waiterFK()
    {
        return $this->hasMany(User::class, 'id', 'id_waiter');
    }
}
