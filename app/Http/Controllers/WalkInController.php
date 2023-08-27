<?php

namespace App\Http\Controllers;

use App\Models\AutoDetailingRecords;
use App\Models\CarwashRecords;
use App\Models\PaintJobRecords;
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
        $idNumber = CarwashRecords::max('user_id');

        if($idNumber === null){
            $nextidNumber = 3001001;
        } else{
            $nextidNumber = $idNumber + 1;
        }

        while (CarwashRecords::where('id', $nextidNumber)->exists()) {
            $nextidNumber++;
        }

        return view('system.walk-in.carwash', compact('nextidNumber'));
    }

    public function carwash_store(Request $request){
        

        CarwashRecords::create([
            // 'TNX_No2' => $request->input('TNX_No2'),
            'user_id' => $request->input('user_id'),
            'date' => $request->input('date'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'contact' => $request->input('contact'),
            'car_year' => $request->input('car_year'),
            'car_make' => $request->input('car_make'),
            'car_model' => $request->input('car_model'),
            'car_variant' => $request->input('car_variant'),
            'unit_plate_no' => $request->input('unit_plate_no'),
            'body_type' => $request->input('body_type'),
            'amount' => $request->input('amount'),

        ]);
        return redirect()->route('system.walk_in.carwash')->with('success', 'Walk-in Car Wash saved successfully');
    }

    public function detailing(){
        $idNumber = AutoDetailingRecords::max('user_id');

        if($idNumber === null){
            $nextidNumber = 4001001;
        } else{
            $nextidNumber = $idNumber + 1;
        }

        while (AutoDetailingRecords::where('id', $nextidNumber)->exists()) {
            $nextidNumber++;
        }

        return view('system.walk-in.detailing', compact('nextidNumber'));
    }

    public function detailing_store(Request $request){

        $amount = str_replace(',', '', $request->input('amount'));
        AutoDetailingRecords::create([
            'TNX_No3' => $request->input('TNX_No3'),
            'user_id' => $request->input('user_id'),
            'date' => $request->input('date'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'contact' => $request->input('contact'),
            'car_year' => $request->input('car_year'),
            'car_make' => $request->input('car_make'),
            'car_model' => $request->input('car_model'),
            'car_variant' => $request->input('car_variant'),
            'unit_plate_no' => $request->input('unit_plate_no'),
            'amount' => $amount,

        ]);
        return redirect()->route('system.walk_in.detailing')->with('success', 'Walk-in Auto Detailing saved successfully');
    }


    public function paintjob(){
        $idNumber = PaintJobRecords::max('user_id');

        if($idNumber === null){
            $nextidNumber = 4001001;
        } else{
            $nextidNumber = $idNumber + 1;
        }

        while (PaintJobRecords::where('id', $nextidNumber)->exists()) {
            $nextidNumber++;
        }

        return view('system.walk-in.paintjob', compact('nextidNumber'));
    }


    public function paintjob_store(Request $request){

        $amount = str_replace(',', '', $request->input('amount'));
        PaintJobRecords::create([
            'TNX_No4' => $request->input('TNX_No4'),
            'user_id' => $request->input('user_id'),
            'date' => $request->input('date'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'contact' => $request->input('contact'),
            'car_year' => $request->input('car_year'),
            'car_make' => $request->input('car_make'),
            'car_model' => $request->input('car_model'),
            'car_variant' => $request->input('car_variant'),
            'unit_plate_no' => $request->input('unit_plate_no'),
            'panel' => $request->input('panel'),
            'amount' => $amount,

        ]);
        return redirect()->route('system.walk_in.paintjob')->with('success', 'Walk-in Paint Job saved successfully');
    }
}
