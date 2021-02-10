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
                ->where('fecha','=',  Carbon::today())
                ->orderBy('fecha', 'DESC')->get();        
    }
    public function scopeMonth($query)
    {
        return $query->select('cuentas.nombre', 'transacciones.*')
                ->join('cuentas', 'transacciones.cuenta_id', '=', 'cuentas.id')
                ->whereMonth('fecha', '=', Carbon::today()->month)
                ->orderBy('fecha', 'DESC')->get();        
    }
    public function scopeYear($query)
    {
        return $query->select('cuentas.nombre', 'transacciones.*')
                ->join('cuentas', 'transacciones.cuenta_id', '=', 'cuentas.id')
                ->whereYear('fecha','=',  Carbon::today()->year)
                ->orderBy('fecha', 'DESC')->get();
    }
}
