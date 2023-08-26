<?php

namespace App\Http\Controllers;

use App\Models\Units;
use App\Models\Appointments;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use App\Mail\AppointmentMail;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function show($uid) {
        $data = Units::findOrFail($uid);
        return view('view-details.index', ['units' => $data]);
    }

    public function show1($uid) {
        $data = Units::findOrFail($uid);
        return view('view-details.index2', ['units' => $data]);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'user_id'  => 'required',
            'uid'  => 'required',
            'car_year'  => 'required',
            'car_make' => 'required',
            'car_model' => 'required',
            'car_variant' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'price' => 'required',
            'date' => 'required',
            'time' => 'required'
        ], [
            'required' => 'Need to fill up your :attribute',
        ]);
       
        Appointments::create($validate);

        return view('home.appoint');
    }


    public function check(Request $request) //Vehicles -> View Details
    {
    $user_id = $request->input('user_id');
    $requestedDate = $request->input('date');
    $requestedTime = $request->input('time');
    $requestedUid = $request->input('uid');
    
    // Check if the requested date and time already exist in the database
    $extiBook = Appointments::where('date', $requestedDate)
    ->where('uid', $requestedUid)
    ->first();

    $extiUser = Appointments::where('user_id', $user_id)->first();

    if ($extiUser) {
        return redirect()->back()->with('error', 'You have already book a slot for Appointment.');
    } 
    elseif ($extiBook) {
        return redirect()->back()->with('error', 'The selected Date is already taken. Please choose another slot.');
    }
    else 

        // $unitPrice = str_replace(',', '', $request->input('car_price'));
        $appInfo = Appointments::create([
            'user_id' => $request->input('user_id'),
            'uid' => $request->input('uid'),
            'car_year' => $request->input('car_year'),
            'car_make' => $request->input('car_make'),
            'car_model' => $request->input('car_model'),
            'car_variant' => $request->input('car_variant'),
            'exterior_color' => $request->input('exterior_color'),
            'car_plate_no' => $request->input('car_plate_no'),
            'car_price' => $request->input('car_price'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
            'image' => $request->input('image'),
            'date' => $requestedDate,
            'time' => $requestedTime,
            'status' => $request->input('status'),
        ]);

        $appointDetails = [
            'title' => 'Appointment Complete',
            'body' => 'Your appointment form is successfully submitted, please wait for the approval.'
        ];

        Mail::to($appInfo->userAppointments->email)->send(new AppointmentMail($appointDetails, 'view-details.mail'));

        return redirect()->route('vehicles.done4');
    }

    public function check1(Request $request) //Vehicles -> View Details
    {
    $user_id = $request->input('user_id');
    $requestedDate = $request->input('date');
    $requestedTime = $request->input('time');
    $requestedUid = $request->input('uid');
    
    // Check if the requested date and time already exist in the database
    $extiBook = Appointments::where('date', $requestedDate)
    ->where('uid', $requestedUid)
    ->first();

    $extiUser = Appointments::where('user_id', $user_id)->first();

    if ($extiUser) {
        return redirect()->back()->with('error', 'You have already book a slot for Appointment.');
    } 
    elseif ($extiBook) {
        return redirect()->back()->with('error', 'The selected Date is already taken. Please choose another slot.');
    }
    else 

        // $unitPrice = str_replace(',', '', $request->input('car_price'));
        $appInfo = Appointments::create([
            'user_id' => $request->input('user_id'),
            'uid' => $request->input('uid'),
            'car_year' => $request->input('car_year'),
            'car_make' => $request->input('car_make'),
            'car_model' => $request->input('car_model'),
            'car_variant' => $request->input('car_variant'),
            'exterior_color' => $request->input('exterior_color'),
            'car_price' => $request->input('car_price'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
            'car_plate_no' => $request->input('car_plate_no'),
            'image' => $request->input('image'),
            'date' => $requestedDate,
            'time' => $requestedTime,
            'status' => $request->input('status'),
        ]);

        $appointDetails = [
            'title' => 'Appointment Complete',
            'body' => 'Your appointment form is successfully submitted, please wait for the approval.'
        ];

        Mail::to($appInfo->userAppointments->email)->send(new AppointmentMail($appointDetails, 'view-details.mail'));

        return redirect()->route('vehicles.done4');
    }
   
}


