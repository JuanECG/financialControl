<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    //use HasFactory;

    public function scopeTrans($query)
    {
        return $query->select('transacciones.id')
                ->join('transacciones', 'transacciones.cuenta_id', '=', 'cuentas.id')
                ->get();        

    }
}
