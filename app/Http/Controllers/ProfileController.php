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
        
     
        $paintjobImages = [];
    
        for ($i = 1; $i <= 6; $i++) {
            $columnName = 'photo_' . $i;
            $imagePath = $bookedPaintJob->$columnName;
    
            if (!empty($imagePath)) {
                $fullImagePath = storage_path('app/public/' . $imagePath);
    
                if (File::exists($fullImagePath)) {
                    $imageUrl = url('storage/' . $imagePath);
                    $paintjobImages[] = $imageUrl;
                }
            }
        }
    
       
    
        $bookedPaintJob->images = $paintjobImages;
    
      
    
        return view('User.booked', compact('bookedCarWash', 'bookedAutoDetailing', 'bookedPaintJob'));
    }
    
    
    
    
    
    
}
