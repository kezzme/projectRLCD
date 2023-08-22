<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservation(){
        $reservation = Reservations::paginate(10);
        return view('system.reservation.index', ['reservation' => $reservation]);
    }
}
