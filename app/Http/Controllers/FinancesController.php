<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinancesController extends Controller
{
    public function getIndex(){
        return view('finances/transfer');
    }

    public function getStatistics(){
        return view('finances/statistics');
    }

    public function getAccount(){
        return view('finances/account');
    }
}
