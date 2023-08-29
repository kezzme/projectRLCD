<?php

namespace App\Http\Controllers;

use App\Mail\AutoDetailingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingMail;
use App\Mail\PaintJobMail;
use App\Models\User;
use App\Models\CarWashes;
use App\Models\AutoDetailings;
use App\Models\PaintJobs;


class ServiceController extends Controller
{

    public function crProcess (Request $request){
        $validate = $request->only([
        'first_name',
        'last_name',
        'contact',
        'car_make',
        'car_model',
        'unit_plate_no',
        'body_type',
        'amount',
        'date',
        'selectedTime_1'
                ]);
          dd($validate);
    }

    public function carwash()
    {
        return view('services.carwash.index');
    }

    public function autodetailing()
    {
        return view('services.auto-detailing.index');
    }

    public function paintjob()
    {
        return view('services.paintjob.index');
    }

    public function check(Request $request) //Car Wash
    {
        $user_id = $request->input('user_id');
        $unit_plate_no = $request->input('unit_plate_no');
        $requestedDate = $request->input('date');
        $requestedTime = $request->input('time');

        // Check if the requested date and time already exist in the database
        $excwBook = Carwashes::where('date', $requestedDate)
        ->where('time', $requestedTime)
        ->first();

        $excwUser = Carwashes::where('user_id', $user_id)->first();

        $excwPlateno = Carwashes::where('unit_plate_no', $unit_plate_no)->first();

        $exadUser = AutoDetailings::where('user_id', $user_id)->first();

        $exadPlateno = AutoDetailings::where('unit_plate_no', $unit_plate_no)->first();

        $expjUser = Paintjobs::where('user_id', $user_id)->first();

        $expjPlateno = Paintjobs::where('unit_plate_no', $unit_plate_no)->first();
        
        if ($excwUser) {
            return redirect()->back()->with('error', 'You have already book a slot for Car Wash.');
        }
        elseif ($excwPlateno) {
            return redirect()->back()->with('error', 'The unit is already book a slot for Car Wash.');
        } 
        elseif ($exadPlateno) {
            return redirect()->back()->with('error', 'The unit is already book a slot for Auto Detailing.');
        } 
        elseif ($exadUser) {
            return redirect()->back()->with('error', 'You have already book a slot for Auto Detailing.');
        }
        elseif ($expjUser) {
            return redirect()->back()->with('error', 'You have already book a slot for Paint Job.');
        }
        elseif ($expjPlateno) {
            return redirect()->back()->with('error', 'The unit is already book a slot for Paint Job.');
        } 
        elseif ($excwBook) {
            return redirect()->back()->with('error', 'The selected Time are already taken. Please choose another slot.');
        } 
        else {

        // Save the appointment to the database if it is available
        $cwInfo = CarWashes::create([
            'user_id'=> $request->input('user_id'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
            'car_make' => $request->input('car_make'),
            'car_model' => $request->input('car_model'),
            'unit_plate_no' => $request->input('unit_plate_no'),
            'body_type' => $request->input('body_type'),
            'amount' => $request->input('amount'),
            'date' => $requestedDate,
            'time' => $requestedTime,
            'special_request' => $request->input('special_request')
        ]);
        
        $details = [
            'user_id'=> $request->input('user_id'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'car_make' => $request->input('car_make'),
            'car_model' => $request->input('car_model'),
            'unit_plate_no' => $request->input('unit_plate_no'),
            'body_type' => $request->input('body_type'),
            'amount' => $request->input('amount'),
            'date' => $requestedDate,
            'time' => $requestedTime,
            'special_request' => $request->input('special_request'),
            'title' => 'Booking Car Wash Service Complete',
            'body' => 'When you arrive, kindly present it.'
        ];

        Mail::to($cwInfo->email)->send(new BookingMail($details, 'services.mail'));

        return redirect('/services/carwash/done');
    }
}


    public function check1(Request $request) //Auto Detailing
        {
        $request->validate([  
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,heif|max:2048', // Validate each photo file
            ]);
            
        $user_id = $request->input('user_id');
        $unit_plate_no = $request->input('unit_plate_no');
        $requestedDate = $request->input('date');
        $requestedTime = $request->input('time');

        // Check if the requested date and time already exist in the database
        $exadBook = AutoDetailings::where('date', $requestedDate)
        ->where('time', $requestedTime)
        ->first();

        $excwUser = Carwashes::where('user_id', $user_id)->first();

        $excwPlateno = Carwashes::where('unit_plate_no', $unit_plate_no)->first();

        $exadUser = AutoDetailings::where('user_id', $user_id)->first();

        $exadPlateno = AutoDetailings::where('unit_plate_no', $unit_plate_no)->first();
        
        if ($excwUser) {
            return redirect()->back()->with('error', 'You have already book a slot for Car Wash.');
        }
        elseif ($excwPlateno) {
            return redirect()->back()->with('error', 'The unit is already book a slot for Car Wash.');
        } 
        elseif ($exadUser) {
            return redirect()->back()->with('error', 'You have already book a slot for Auto Detailing.');
        }
        elseif ($exadPlateno) {
            return redirect()->back()->with('error', 'The unit is already book a slot for Auto Detailing.');
        }
        elseif ($exadBook) {
            return redirect()->back()->with('error', 'The selected Time are already taken. Please choose another slot.');
        } 
        elseif ($request->hasFile('photos')) {
            $photoDetails = [];
    
            foreach ($request->file('photos') as $index => $photoFile) {
                $newFilename = $photoFile->store('auto-detailing', 'public'); // Laravel will automatically encrypt the filename
                $photoDetails[] = $newFilename;
            }

            $adInfo = AutoDetailings::create([
                'user_id' => $request->input('user_id'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'contact' => $request->input('contact'),
                'email' => $request->input('email'),
                'car_year' => $request->input('car_year'),
                'car_make' => $request->input('car_make'),
                'car_model' => $request->input('car_model'),
                'car_variant' => $request->input('car_variant'),
                'unit_plate_no' => $request->input('unit_plate_no'),
                'date' => $requestedDate,
                'time' => $requestedTime,
                'special_request' => $request->input('special_request'),
                'photo_1' => isset($photoDetails[0]) ? $photoDetails[0] : null,
                'photo_2' => isset($photoDetails[1]) ? $photoDetails[1] : null,
                'photo_3' => isset($photoDetails[2]) ? $photoDetails[2] : null,
                'photo_4' => isset($photoDetails[3]) ? $photoDetails[3] : null,
                'photo_5' => isset($photoDetails[4]) ? $photoDetails[4] : null,
                'photo_6' => isset($photoDetails[5]) ? $photoDetails[5] : null,
            ]);

            $details = [
                'user_id'=> $request->input('user_id'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'car_year' => $request->input('car_year'),
                'car_make' => $request->input('car_make'),
                'car_model' => $request->input('car_model'),
                'car_variant' => $request->input('car_variant'),
                'unit_plate_no' => $request->input('unit_plate_no'),
                'date' => $requestedDate,
                'time' => $requestedTime,
                'special_request' => $request->input('special_request'),
                'title' => 'Booking Auto Detailing Service Complete',
                'body' => 'Please wait for the approval.'
            ];

            Mail::to($adInfo->email)->send(new AutoDetailingMail($details, 'services.detailing-mail'));

            return redirect('/services/auto-detailing/done');
        }
       
    }
    

    public function check2(Request $request) //Paintjob
        {
        $request->validate([  
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,heif|max:2048', // Validate each photo file
            ]);
            
        $user_id = $request->input('user_id');
        $unit_plate_no = $request->input('unit_plate_no');
        $requestedDate = $request->input('date');
        $requestedTime = $request->input('time');

        // Check if the requested date and time already exist in the database
        $expjBook = Paintjobs::where('date', $requestedDate)
        ->where('time', $requestedTime)
        ->first();

        $excwUser = Carwashes::where('user_id', $user_id)->first();

        $excwPlateno = Carwashes::where('unit_plate_no', $unit_plate_no)->first();

        $expjUser = Paintjobs::where('user_id', $user_id)->first();

        $expjPlateno = Paintjobs::where('unit_plate_no', $unit_plate_no)->first();
        
        if ($excwUser) {
            return redirect()->back()->with('error', 'You have already book a slot for Car Wash.');
        }
        elseif ($excwPlateno) {
            return redirect()->back()->with('error', 'The unit is already book a slot for Car Wash.');
        } 
        elseif ($expjUser) {
            return redirect()->back()->with('error', 'You have already book a slot for Paint Job.');
        }
        elseif ($expjPlateno) {
            return redirect()->back()->with('error', 'The unit is already book a slot for Paint Job.');
        } 
        elseif ($expjBook) {
            return redirect()->back()->with('error', 'The selected Time are already taken. Please choose another slot.');
        } 
        elseif ($request->hasFile('photos')) {
            $photoDetails = [];
    
            foreach ($request->file('photos') as $index => $photoFile) {
                $newFilename = $photoFile->store('paint-job', 'public'); // Laravel will automatically encrypt the filename
                $photoDetails[] = $newFilename;
            }

            $pjInfo = Paintjobs::create([
                'user_id' => $request->input('user_id'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'contact' => $request->input('contact'),
                'email' => $request->input('email'),
                'car_year' => $request->input('car_year'),
                'car_make' => $request->input('car_make'),
                'car_model' => $request->input('car_model'),
                'car_variant' => $request->input('car_variant'),
                'unit_plate_no' => $request->input('unit_plate_no'),
                'date' => $requestedDate,
                'time' => $requestedTime,
                'special_request' => $request->input('special_request'),
                'photo_1' => isset($photoDetails[0]) ? $photoDetails[0] : null,
                'photo_2' => isset($photoDetails[1]) ? $photoDetails[1] : null,
                'photo_3' => isset($photoDetails[2]) ? $photoDetails[2] : null,
                'photo_4' => isset($photoDetails[3]) ? $photoDetails[3] : null,
                'photo_5' => isset($photoDetails[4]) ? $photoDetails[4] : null,
                'photo_6' => isset($photoDetails[5]) ? $photoDetails[5] : null,
            ]);

            $details = [
                'user_id'=> $request->input('user_id'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'car_year' => $request->input('car_year'),
                'car_make' => $request->input('car_make'),
                'car_model' => $request->input('car_model'),
                'car_variant' => $request->input('car_variant'),
                'unit_plate_no' => $request->input('unit_plate_no'),
                'date' => $requestedDate,
                'time' => $requestedTime,
                'special_request' => $request->input('special_request'),
                'title' => 'Booking Auto Detailing Service Complete',
                'body' => 'Please wait for your approval.',
                'title' => 'Booking Paint Job Service Complete',
                'body' => 'Please wait for the approval.'
            ];

            Mail::to($pjInfo->email)->send(new PaintJobMail($details, 'services.paintjob-mail'));

            return redirect('/services/paintjob/done');
        }
       
    }

}