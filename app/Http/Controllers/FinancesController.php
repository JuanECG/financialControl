<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Transacciones;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class FinancesController extends Controller
{

    public function getIndex($filter)
    {
        $id = Auth::id();
        if ($filter === 'day') {
            return view(
                'Finances.transfer',
                array(
                    'transacciones' => $trans = Transacciones::Day()->where('propietario_id', '=', $id),
                    'type' => 0,
                    'cuentas' => $cuentas = Cuenta::all()->where('propietario_id', '=', $id)
                )
            );
        } elseif ($filter === 'month') {
            return view(
                'Finances.transfer',
                array(
                    'transacciones' => $trans = Transacciones::Month()->where('propietario_id', '=', $id),
                    'type' => 1,
                    'cuentas' => $cuentas = Cuenta::all()->where('propietario_id', '=', $id)
                )
            );
        } elseif ($filter === 'year') {
            $id = Auth::id();
            return view(
                'Finances.transfer',
                array(
                    'transacciones' => $trans = Transacciones::Year()->where('propietario_id', '=', $id),
                    'type' => 2,
                    'cuentas' => $cuentas = Cuenta::all()->where('propietario_id', '=', $id)
                )
            );
        } elseif ($filter === 'total') {
            return view(
                'Finances.transfer',
                array(
                    'transacciones' => $trans = Transacciones::all()->where('propietario_id', '=', $id),
                    'type' => 3,
                    'cuentas' => $cuentas = Cuenta::all()->where('propietario_id', '=', $id)
                )
            );
        }
    }

    public function postCreateT(Request $request)
    {
        //dd( request()->all() );
        //dd( Carbon::today());

        $id = Auth::id();
        $nTrans = new Transacciones();
        $cuenta = Cuenta::where('id', '=', $request->cuenta)->first();

        // update 'cantidad' in 'cuentas' table
        if ($request->tipo == 'Ingreso') {
            $cuenta->saldo = ($cuenta->saldo + $request->cantidad);
        } else {
            $cuenta->saldo = ($cuenta->saldo - $request->cantidad);
        }
        $cuenta->save();

        $nTrans->tipo = $request->tipo;
        $nTrans->desc = $request->desc;
        $nTrans->cantidad = $request->cantidad;
        $nTrans->fecha = $request->fecha;
        $nTrans->propietario_id = $id;
        $nTrans->cuenta_id = $request->cuenta;
        $nTrans->save();
        return redirect('/');
    }

    public function DeleteT(Request $request)
    {
        $trans = Transacciones::where('id', '=', $request->t_id)->first();
        $cuenta = Cuenta::where('id', '=', $trans->cuenta_id)->first();

        // update 'cantidad' in 'cuentas' table
        if ($trans->tipo == 'Ingreso') {
            $cuenta->saldo = ($cuenta->saldo - $trans->cantidad);
        } else {
            $cuenta->saldo = ($cuenta->saldo + $trans->cantidad);
        }

        $cuenta->save();
        $trans->delete();

        return redirect('/');
    }

    public function putEditT(Request $request)
    {
        $trans = Transacciones::where('id', '=', $request->t_id)->first();
        $cuenta = Cuenta::where('id', '=', $trans->cuenta_id)->first();

        $n_saldo = 0;

        if ($trans->cuenta_id != $request->cuenta) // cuenta changed
        {
            $this->DeleteT($request);
            $this->postCreateT($request);
            return redirect('/');
        }
        
        if ($trans->tipo != $request->tipo) { //type changed

            if ($trans->cantidad != $request->cantidad) $n_saldo = $request->cantidad;
            else $n_saldo = $trans->cantidad;

            if ($request->tipo == 'Ingreso') {
                $cuenta->saldo = ($cuenta->saldo + $trans->cantidad) + $n_saldo;
            } else {
                $cuenta->saldo = ($cuenta->saldo - $trans->cantidad) - $n_saldo;
            }
            $trans->fecha = $request->fecha;
            $trans->cuenta_id = $request->cuenta;
            $trans->cantidad = $n_saldo;
            $trans->tipo = $request->tipo;
            $trans->desc = $request->desc;
            $cuenta->save();
            $trans->save();
            return redirect('/');            
        }
        
        if ($trans->cantidad != $request->cantidad) { //cantidad changed

            if ($request->tipo == 'Ingreso') {
                $cuenta->saldo = ($cuenta->saldo - $trans->cantidad) + $request->cantidad;
            } else {
                $cuenta->saldo = ($cuenta->saldo + $trans->cantidad) - $request->cantidad;
            }
        } else {
            $trans->cantidad = $request->cantidad;
        }

        $trans->fecha = $request->fecha;
        $trans->cuenta_id = $request->cuenta;
        $trans->cantidad = $request->cantidad;
        $trans->tipo = $request->tipo;
        $trans->desc = $request->desc;
        $cuenta->save();
        $trans->save();
        return redirect('/');
    }


    public function getStatistics()
    {
        $id = Auth::id();
        $egresos = DB::table('transacciones')->where('tipo','Egreso')->where('propietario_id','=',$id)->select(DB::raw('sum(cantidad) as suma'))->get();
        $ingresos = DB::table('transacciones')->where('tipo','Ingreso')->where('propietario_id','=',$id)->select(DB::raw('sum(cantidad) as suma'))->get();
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $egreso = '';
        $ingreso = '';
        foreach($egresos as $alv2){
           $egreso= (int)$alv2->suma;
        }
        foreach($ingresos as $alv2){
            $ingreso= (int)$alv2->suma;
         }
        $chart = LarapexChart::setTitle('Resumen de Transacciones')
                   ->setDataset([$ingreso, $egreso])
                   ->setLabels(['Ingresos', 'Egresos']);
        return view('Finances.statistics',array('chart'=> $chart));
    }

    public function getAccount()
    {
        $id = Auth::id();
        return view('Finances.account', array('cuentas' => $cuenta = Cuenta::all()->where('propietario_id', '=', $id)));
    }

    public function postCreateC(Request $request)
    {
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

    public function DeleteC(Request $request)
    {        

        $cuenta = Cuenta::where('id', '=', $request->c_id)->first();
        $trans = Transacciones::Trans($request->c_id);        

        foreach ($trans as $c_trans) {
            $t = Transacciones::where('id', '=', $c_trans->id)->first();
            $t->delete();
        }

        $cuenta->delete();

        return redirect('/me');

    }

    public function postEditC(Request $request){
        $cuenta = Cuenta::where('id', '=', $request->c_id)->first();
        $cuenta->nombre = $request->nombre;
        $cuenta->tipo = $request->tipo;
        $cuenta->saldo = $request->saldo;
        $cuenta->save();
        return redirect('/me');
    }
}
