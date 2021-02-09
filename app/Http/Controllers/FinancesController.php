<?php

namespace App\Http\Controllers;
use App\Models\Cuenta;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Transacciones;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FinancesController extends Controller
{    

    public function getIndex($filter){
        $id = Auth::id(); 
        if ($filter === 'day'){
            return view('finances/transfer',  
            array('transacciones'=> $trans = Transacciones::Day()->where('propietario_id', '=', $id),
            'type'=> 0,
            'cuentas'=> $cuentas = Cuenta::all()->where('propietario_id','=',$id)));   
        }
        elseif($filter === 'month'){
            return view('finances/transfer',  
            array('transacciones'=>$trans = Transacciones::Month()->where('propietario_id', '=', $id),
            'type'=> 1,
            'cuentas'=> $cuentas = Cuenta::all()->where('propietario_id','=',$id)));
        }
        elseif($filter === 'year'){
            $id = Auth::id(); 
            return view('finances/transfer',  
            array('transacciones'=> $trans = Transacciones::Year()->where('propietario_id', '=', $id),
            'type'=> 2,
            'cuentas'=> $cuentas = Cuenta::all()->where('propietario_id','=',$id)));
        }
        elseif($filter === 'total'){
            return view('finances/transfer',  
            array('transacciones'=> $trans = Transacciones::all()->where('propietario_id', '=', $id),
            'type'=> 3,
            'cuentas'=> $cuentas = Cuenta::all()->where('propietario_id','=',$id)));
        }

    }

    public function postCreateT(Request $request){
        $id = Auth::id();         
        //dd( request()->all() );
        //dd( Carbon::today());
        $nTrans = new Transacciones();
        $nTrans->tipo = $request->tipo;
        $nTrans->desc = $request->desc;
        $nTrans->cantidad = $request->cantidad;
        $nTrans->fecha = $request->fecha;
        $nTrans->propietario_id = $id; 
        $nTrans->cuenta_id = $request->cuenta;
        $nTrans->save();
        return redirect('/');
    }

    public function postCreateC(Request $request){
        $id = Auth::id();         
        $nCuenta = new Cuenta();
        $nCuenta->nombre = $request->nombre;
        $nCuenta->tipo = $request->tipo;
        $nCuenta->saldo = $request->saldo;
        $nCuenta->fecha_ingreso = Carbon::today();
        $nCuenta->propietario_id = $id;
        $nCuenta->save();
        return redirect('/me');

    }
    public function getStatistics(){
        return view('finances/statistics');
    }

    public function getAccount(){
        $id = Auth::id(); 
        return view('finances/account', array('cuentas'=> $cuenta = Cuenta::all()->where('propietario_id', '=', $id)));        
    }
}
