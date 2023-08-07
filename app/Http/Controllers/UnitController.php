<?php

namespace App\Http\Controllers;

use App\Models\Soldunits;
use App\Models\Units;
use Illuminate\Http\Request;

class UnitController extends Controller
{

    public function services() {
        return view('home.services');
    }

    public function vehicles() {
        $data = Units::where('unit_type', 'old')->get();
        return view('home.vehicles', ['units' => $data]);
    }

    public function newArrival() {
        $data = Units::where('unit_type', 'new')->get();
        return view('home.new-arrival', ['units' => $data]);
    }

    public function addUnit(){
        return view('system.inventory.addunit');
    }

    public function showroom(){
        return view('system.inventory.showroom', ['units' => Units::all()]);
    }

    public function soldUnits(){
        return view('system.inventory.soldunits', ['soldUnits' => Soldunits::all()]);

    }

}
