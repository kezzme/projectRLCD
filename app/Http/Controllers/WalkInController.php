<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalkInController extends Controller
{
    public function unit(){
        return view('system.walk-in.unit');
    }

    public function financing(){
        return view('system.walk-in.financing');
    }

    public function trades(){
        return view('system.walk-in.trade-in');
    }

    public function carwash(){
        return view('system.walk-in.carwash');
    }

    public function detailing(){
        return view('system.walk-in.detailing');
    }

    public function paintjob(){
        return view('system.walk-in.paintjob');
    }
}
