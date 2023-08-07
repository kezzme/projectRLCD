<?php

namespace App\Http\Controllers;

use App\Models\Units;
use App\Models\Soldunits;
use App\Models\Appointments;
use App\Models\FinancingConfirmations;
use Illuminate\Http\Request;


class SystemAppointmentController extends Controller
{
    public function appointments(){
        $appointments = Appointments::paginate(10);
        return view('system.appointment.index', ['appointments' => $appointments]);
    }

    public function toSoldunits($id)
    {
        $appointment = Appointments::find($id);
        
        if ($appointment) {
            $soldUnitsTable = new Soldunits;
            $soldUnitsTable->fill($appointment->toArray());
            $soldUnitsTable->save();
    
            $appointment->delete();

            Appointments::where('uid', '$uid')->delete();
            
            // Units::where('uid', '$uid')->delete();

            
    
            return back()->with('success', 'Appointment transferred successfully');
        }
    
        return back()->with('error', 'Appointment not found.');
    }

    public function toFinancing($id)
    {
        $appointment = Appointments::find($id);

        if($appointment){
            $financingTable = new FinancingConfirmations;
            $financingTable->fill($appointment->toArray());
            $financingTable->save();

            $appointment->delete();

            return back()->with('success', 'Appointment transferred successfully');
        }

        return back()->with('error', 'Appointment not found.');
    }

}