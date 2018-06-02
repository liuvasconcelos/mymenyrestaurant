<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Couvert extends Model
{
    protected $table = 'couverts';
    protected $primaryKey = 'id_couvert';

    public $fillable = [
        'id_table',
        'value',
        'status'
    ];

    public function tableFK()
    {
        return $this->hasMany(Table::class, 'id_table', 'id_table');
    }
}
