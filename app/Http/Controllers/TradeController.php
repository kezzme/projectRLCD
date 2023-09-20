<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TradeinMail;
use App\Models\Units;
use App\Models\Trades;
use App\Models\CarWashes;
use App\Models\AutoDetailings;
use App\Models\PaintJobs;

class TradeController extends Controller
{
    
    public function show($uid) {
        $data = Units::findOrFail($uid);
        return view('trade-in.index', ['units' => $data]);
    }

    public function show1($uid) {
        $data = Units::findOrFail($uid);
        return view('trade-in.index2', ['units' => $data]);
    }

    public function check(Request $request) //Auto Detailing
    {
    $request->validate([  
        'photos.*' => 'image|mimes:jpeg,png,jpg,gif,heif|max:2048', // Validate each photo file
        ]);
        
    $user_id = $request->input('user_id');
    $unit_plate_no = $request->input('unit_plate_no');
    $requestedDate = $request->input('date');
    $requestedTime = $request->input('time');
    $requestedUid = $request->input('uid');
    
    // Check if the requested date and time already exist in the database
    $extiBook = Trades::where('date', $requestedDate)
    ->where('uid', $requestedUid)
    ->first();

    $excwPlateno = Carwashes::where('unit_plate_no', $unit_plate_no)->first();

    $exadPlateno = AutoDetailings::where('unit_plate_no', $unit_plate_no)->first();

    $expjPlateno = Paintjobs::where('unit_plate_no', $unit_plate_no)->first();

    $extiUser = Trades::where('user_id', $user_id)->first();

    $extiPlateno = Trades::where('unit_plate_no', $unit_plate_no)->first();
    
    
    if ($excwPlateno) {
        return redirect()->back()->with('error', 'The unit is already book a slot for Car Wash.');
    } 
    elseif ($exadPlateno) {
        return redirect()->back()->with('error', 'The unit is already book a slot for Auto Detailing.');
    }
    elseif ($expjPlateno) {
        return redirect()->back()->with('error', 'The unit is already book a slot for Paint Job.');
    } 
    elseif ($extiUser) {
        return redirect()->back()->with('error', 'You have already book a slot for Trade-in.');
    }
    elseif ($extiPlateno) {
        return redirect()->back()->with('error', 'The unit is already book a slot for Trade-in.');
    }  
    elseif ($extiBook) {
        return redirect()->back()->with('error', 'The selected Date is already taken. Please choose another slot.');
    }
    elseif ($request->hasFile('photos')) {
        $photoDetails = [];

        foreach ($request->file('photos') as $index => $photoFile) {
            $newFilename = $photoFile->store('trade-in', 'public'); // Laravel will automatically encrypt the filename
            $photoDetails[] = $newFilename;
        }

    
       
        $unitPrice = str_replace(',', '', $request->input('unit_trade_value'));
        $dateFormat = date('Y-m-d', strtotime($requestedDate));

        $adInfo = Trades::create([
            'user_id' => $request->input('user_id'),
            'uid' => $request->input('uid'),
            'car_year' => $request->input('car_year'),
            'car_make' => $request->input('car_make'),
            'car_model' => $request->input('car_model'),
            'car_variant' => $request->input('car_variant'),
            'car_plate_no' => $request->input('car_plate_no'),
            'bought_price' => $request->input('bought_price'),
            'car_price' => $request->input('car_price'),
            'image' => $request->input('image'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
            'unit_year' => $request->input('unit_year'),
            'unit_make' => $request->input('unit_make'),
            'unit_model' => $request->input('unit_model'),
            'unit_variant' => $request->input('unit_variant'),
            'unit_plate_no' => $request->input('unit_plate_no'),
            'unit_trade_value' => $unitPrice,
            'date' => $dateFormat,
            'time' => $requestedTime,
            'photo_1' => isset($photoDetails[0]) ? $photoDetails[0] : null,
            'photo_2' => isset($photoDetails[1]) ? $photoDetails[1] : null,
            'photo_3' => isset($photoDetails[2]) ? $photoDetails[2] : null,
            'photo_4' => isset($photoDetails[3]) ? $photoDetails[3] : null,
            'photo_5' => isset($photoDetails[4]) ? $photoDetails[4] : null,
            'photo_6' => isset($photoDetails[5]) ? $photoDetails[5] : null,

        ]);
        

        $tradeDetails = [
            'user_id' => $request->input('user_id'),
            'car_year' => $request->input('car_year'),
            'car_make' => $request->input('car_make'),
            'car_model' => $request->input('car_model'),
            'car_variant' => $request->input('car_variant'),
            'car_plate_no' => $request->input('car_plate_no'),
            'car_price' => $request->input('car_price'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'unit_year' => $request->input('unit_year'),
            'unit_make' => $request->input('unit_make'),
            'unit_model' => $request->input('unit_model'),
            'unit_variant' => $request->input('unit_variant'),
            'unit_plate_no' => $request->input('unit_plate_no'),
            'unit_trade_value' => $unitPrice,
            'date' => $requestedDate,
            'time' => $requestedTime,
            'title' => 'Trade-in Request Complete',
            'body' => 'Please wait for the approval.'
        ];

        Mail::to($adInfo->email)->send(new TradeinMail($tradeDetails, 'trade-in.mail'));

        return redirect()->route('vehicles.done3');
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
    $requestedUid = $request->input('uid');
    
    // Check if the requested date and time already exist in the database
    $extiBook = Trades::where('date', $requestedDate)
    ->where('uid', $requestedUid)
    ->first();

    $excwPlateno = Carwashes::where('unit_plate_no', $unit_plate_no)->first();

    $exadPlateno = AutoDetailings::where('unit_plate_no', $unit_plate_no)->first();

    $expjPlateno = Paintjobs::where('unit_plate_no', $unit_plate_no)->first();

    $extiUser = Trades::where('user_id', $user_id)->first();

    $extiPlateno = Trades::where('unit_plate_no', $unit_plate_no)->first();
    
    
    if ($excwPlateno) {
        return redirect()->back()->with('error', 'The unit is already book a slot for Car Wash.');
    } 
    elseif ($exadPlateno) {
        return redirect()->back()->with('error', 'The unit is already book a slot for Auto Detailing.');
    }
    elseif ($expjPlateno) {
        return redirect()->back()->with('error', 'The unit is already book a slot for Paint Job.');
    } 
    elseif ($extiUser) {
        return redirect()->back()->with('error', 'You have already book a slot for Trade-in.');
    }
    elseif ($extiPlateno) {
        return redirect()->back()->with('error', 'The unit is already book a slot for Trade-in.');
    }  
    elseif ($extiBook) {
        return redirect()->back()->with('error', 'The selected Date is already taken. Please choose another slot.');
    }
    elseif ($request->hasFile('photos')) {
        $photoDetails = [];

        foreach ($request->file('photos') as $index => $photoFile) {
            $newFilename = $photoFile->store('trade-in', 'public');
            $photoDetails[] = $newFilename;
        }
       

        $unitPrice = str_replace(',', '', $request->input('unit_trade_value'));
        $dateFormat = date('Y-m-d', strtotime($requestedDate));
        $adInfo = Trades::create([
            'user_id' => $request->input('user_id'),
            'uid' => $request->input('uid'),
            'car_year' => $request->input('car_year'),
            'car_make' => $request->input('car_make'),
            'car_model' => $request->input('car_model'),
            'car_variant' => $request->input('car_variant'),
            'car_plate_no' => $request->input('car_plate_no'),
            'bought_price' => $request->input('bought_price'),
            'car_price' => $request->input('car_price'),
            'image' => $request->input('image'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
            'unit_year' => $request->input('unit_year'),
            'unit_make' => $request->input('unit_make'),
            'unit_model' => $request->input('unit_model'),
            'unit_variant' => $request->input('unit_variant'),
            'unit_plate_no' => $request->input('unit_plate_no'),
            'unit_trade_value' => $unitPrice,
            'date' => $dateFormat,
            'time' => $requestedTime,
            'photo_1' => isset($photoDetails[0]) ? $photoDetails[0] : null,
            'photo_2' => isset($photoDetails[1]) ? $photoDetails[1] : null,
            'photo_3' => isset($photoDetails[2]) ? $photoDetails[2] : null,
            'photo_4' => isset($photoDetails[3]) ? $photoDetails[3] : null,
            'photo_5' => isset($photoDetails[4]) ? $photoDetails[4] : null,
            'photo_6' => isset($photoDetails[5]) ? $photoDetails[5] : null,
        ]);

        $tradeDetails = [
            'user_id' => $request->input('user_id'),
            'car_year' => $request->input('car_year'),
            'car_make' => $request->input('car_make'),
            'car_model' => $request->input('car_model'),
            'car_variant' => $request->input('car_variant'),
            'car_plate_no' => $request->input('car_plate_no'),
            'car_price' => $request->input('car_price'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'unit_year' => $request->input('unit_year'),
            'unit_make' => $request->input('unit_make'),
            'unit_model' => $request->input('unit_model'),
            'unit_variant' => $request->input('unit_variant'),
            'unit_plate_no' => $request->input('unit_plate_no'),
            'unit_trade_value' => $unitPrice,
            'date' => $requestedDate,
            'time' => $requestedTime,
            'title' => 'Trade-in Request Complete',
            'body' => 'Please wait for the approval.'
        ];

        Mail::to($adInfo->email)->send(new TradeinMail($tradeDetails, 'trade-in.mail'));

        return redirect()->route('vehicles.done4');
    }
   
  }

}
