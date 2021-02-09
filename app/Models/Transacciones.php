<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacciones extends Model
{
    //use HasFactory;

    public function scopeDay($query)
    {
        return $query->select('cuentas.nombre', 'transacciones.*')
                ->join('cuentas', 'transacciones.cuenta_id', '=', 'cuentas.id')
                ->where('fecha','=',  Carbon::today())->get();        
    }
    public function scopeMonth($query)
    {
        return $query->select('cuentas.nombre', 'transacciones.*')
        ->join('cuentas', 'transacciones.cuenta_id', '=', 'cuentas.id')
        ->whereMonth('fecha', '=', Carbon::today()->month)->get();        
    }
    public function scopeYear($query)
    {
        return $query->select('cuentas.nombre', 'transacciones.*')
        ->join('cuentas', 'transacciones.cuenta_id', '=', 'cuentas.id')
        ->whereYear('fecha','=',  Carbon::today()->year)->get();
    }
}
