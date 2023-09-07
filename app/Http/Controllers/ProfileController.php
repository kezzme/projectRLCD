<?php

namespace App\Http\Controllers;

use App\Models\CarWashes;
use App\Models\AutoDetailings;
use App\Models\PaintJobs;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function booked_services(){
        $user = auth()->user();
        $bookedCarWash = $user->userCarWashes;
        $bookedAutoDetailing = $user->userAutoDetailings;
        $bookedPaintJob = $user->userPaintJobs;
    
        return view('user.booked', compact('bookedCarWash', 'bookedAutoDetailing', 'bookedPaintJob'));
    }
    
    public function trade_request() {
        $user = auth()->user();
        $tradeRequest = $user->userTrades;

        return view('user.trade-request', compact('tradeRequest'));
    }

    public function appoints() {
        $user = auth()->user();
        $appointments = $user->userAppointments;

        return view('user.appointment', compact('appointments'));
    }
    
}
