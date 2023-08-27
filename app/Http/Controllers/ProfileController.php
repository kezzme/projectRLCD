<?php

namespace App\Http\Controllers;

use App\Models\CarWashes;
use App\Models\AutoDetailings;
use App\Models\PaintJobs;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function booked_services(){
        $user = auth()->user();
        $bookedCarWash = $user->userCarWashes; // Use the relationship method
        // dd($bookedCarWash);
    
        return view('User.booked', ['bookedCarWash' => $bookedCarWash]);
    }
    
}
