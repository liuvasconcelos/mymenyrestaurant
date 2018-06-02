<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'id_reservation';

    public $fillable = [
        'id_table',
        'client_name',
        'client_phone',
        'quantity_of_clients',
        'reservation_time',
        'status'
    ];

    public function tableFK()
    {
        return $this->hasMany(Table::class, 'id_table', 'id_table');
    }
}
