<?php

namespace App\Http\Controllers;

use App\Models\CarWashes;
use App\Models\CarwashRecords;
use Illuminate\Http\Request;

class SystemCarwashController extends Controller
{
    public function confirmation(){
        return view('system.carwash.confirmation', ['carwashes' => CarWashes::paginate(10)]);
    }

    public function toRecords($id){
        $cw_confirmation = CarWashes::find($id);

        if($cw_confirmation){
            $toRecordsTable = new CarwashRecords();
            $toRecordsTable->fill($cw_confirmation->toArray());
            $toRecordsTable->save();

            $cw_confirmation->delete();

            return back()->with('success', 'Carwash checkout successfully');
        }
        return back()->with('error', 'Carwash not found.');
    }

    public function void($id){
        $void_carwash = CarWashes::find($id);
        
        if($void_carwash){
            $void_carwash->delete();

            return back()->with('success', 'Carwash void successfully');
        }
        return back()->with('error', 'Carwash not found.');
    }

    public function records(){
        return view('system.carwash.records', ['records' => CarwashRecords::paginate(10)]);
    }
}
