<?php

namespace App\Http\Controllers;

use App\Models\Soldunits;
use App\Models\Appointments;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Models\FinancingConfirmations;

class ReservationController extends Controller
{
    public function reservation(){
        $reservation = Reservations::paginate(10);
        return view('system.reservation.index', ['reservation' => $reservation]);
    }

    public function toSoldunits($id)
    {
        $appointment = Reservations::find($id);
        
        if ($appointment) {
            $soldUnitsTable = new Soldunits;
            $soldUnitsTable->fill($appointment->toArray());
            $soldUnitsTable->transaction_type = $
            $soldUnitsTable->save();
    
            $appointment->delete();

            Reservations::where('uid', '$uid')->delete();
            
            // Units::where('uid', '$uid')->delete();

            
    
            return back()->with('success', 'Appointment transferred successfully');
        }
    
        return back()->with('error', 'Appointment not found.');
    }

    public function toFinancing($id)
    {
        $appointment = Reservations::find($id);

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
