<?php

namespace App\Http\Controllers;

use App\Models\Trades;
use App\Models\Soldunits;
use App\Models\TradedUnits;
use Illuminate\Http\Request;
use App\Models\TradesStatuses;
use Illuminate\Support\Facades\File;

class SystemTradesController extends Controller
{
    public function tiRequests()
    {
        $trades = Trades::paginate(10);

        foreach ($trades as $trade) {
            $tradeImages = [];

            // Loop through each image column and convert them to image URLs
            for ($i = 1; $i <= 6; $i++) {
                $columnName = 'photo_' . $i;
                $imagePaths = $trade->$columnName;

                if (is_array($imagePaths)) {
                    // Loop through each image path and convert them to URLs
                    foreach ($imagePaths as $imagePath) {
                        $fullImagePath = storage_path('app/public/' . $imagePath);

                        if (File::exists($fullImagePath)) {
                            $imageUrl = url('storage/' . $imagePath);
                            $tradeImages[] = $imageUrl;
                        }
                    }
                } elseif (is_string($imagePaths)) {
                    // Handle the case where the column contains a single image path (string)
                    $fullImagePath = storage_path('app/public/' . $imagePaths);

                    if (File::exists($fullImagePath)) {
                        $imageUrl = url('storage/' . $imagePaths);
                        $tradeImages[] = $imageUrl;
                    }
                }
            }
            $trade->images = $tradeImages;
        }

        return view('system.trade-in.requests', compact('trades'));
    }


    public function phase1($id){
        $trades = Trades::find($id);
      
        if($trades){
            $trades->delete();
        }

        // Mail::to($cwInfo->userCarWashes->email)->send(new BookingMail($details, 'services.mail'));
        return back()->with('success', 'The trade-in request has been rejected successfully');
    }

    public function phase2($id){
        $trades = Trades::find($id);
        dd($trades->all());
        if($trades){
            $trades->delete();
        }

        // Mail::to($cwInfo->userCarWashes->email)->send(new BookingMail($details, 'services.mail'));
        return back()->with('success', 'The trade-in request has been rejected successfully');
    }

    public function toStatus($id){
        $trades = Trades::find($id);
        
        
        if ($trades) {
            $toStatusTable = new TradesStatuses();
            $toStatusTable->fill($trades->toArray());
            $toStatusTable->save();
    
            $trades->delete();


            // Units::where('uid', '$uid')->delete();

    
            return back()->with('success', 'Trade-in Request transferred successfully');
        }
    
        return back()->with('error', 'Trade-in not found.');
    }



    public function status(){
        $tiStatuses = TradesStatuses::paginate(10);

        foreach ($tiStatuses as $status) {
            $tradeImages = [];

            // Loop through each image column and convert them to image URLs
            for ($i = 1; $i <= 6; $i++) {
                $columnName = 'photo_' . $i;
                $imagePaths = $status->$columnName;

                if (is_array($imagePaths)) {
                    // Loop through each image path and convert them to URLs
                    foreach ($imagePaths as $imagePath) {
                        $fullImagePath = storage_path('app/public/' . $imagePath);

                        if (File::exists($fullImagePath)) {
                            $imageUrl = url('storage/' . $imagePath);
                            $tradeImages[] = $imageUrl;
                        }
                    }
                } elseif (is_string($imagePaths)) {
                    // Handle the case where the column contains a single image path (string)
                    $fullImagePath = storage_path('app/public/' . $imagePaths);

                    if (File::exists($fullImagePath)) {
                        $imageUrl = url('storage/' . $imagePaths);
                        $tradeImages[] = $imageUrl;
                    }
                }
            }
            $status->images = $tradeImages;
        }

        return view('system.trade-in.status', ['tiStatuses' => $tiStatuses]);
    }


    public function totiReceipt($id){
        $toReceipt = TradesStatuses::find($id);

        $checkboxes = [
            'LTO OFFICIAL RECEIPT',
            'PHOTO OF ID\'S WITH SIGNATURE',
            'LTO CERTIFICATE OF REGISTRATION',
            'SECRETARY\'S CERTIFICATE',
            'DEDD OF SALES',
            'RELEASE OF CHATTLEMORTGAGE',
        ];

        $checkboxes2 = [
            'LTO OFFICIAL RECEIPT',
            'PHOTO OF ID\'S WITH SIGNATURE',
            'LTO CERTIFICATE OF REGISTRATION',
            'SECRETARY\'S CERTIFICATE',
            'DEDD OF SALES',
            'RELEASE OF CHATTLEMORTGAGE',
        ];

        return view('system.trade-in.receipt', compact('toReceipt', 'checkboxes', 'checkboxes2'));
    }

    public function tradeStore(Request $request) {
        $action = $request->input('action');

        if ($action === 'TRADED') {
            return redirect()->route('system.trade_in.toTraded');
        } elseif ($action === 'RESERVED') {
            return redirect()->route('system.appointments.toReservation');
        }
        return back()->with('success', 'Record stored successfully');
    }

    public function toTraded(Request $request){
       
       $price = str_replace(',', '', $request->input('price'));
       $car_price = str_replace(',', '', $request->input('car_price'));
       $unit_price = str_replace(',', '', $request->input('unit_price'));
       $agreedPrice = str_replace(',', '', $request->input('agreed_price'));
       $balance = str_replace(',', '', $request->input('balance'));
       $deposit = str_replace(',', '', $request->input('deposit'));
   
       $arInfo = TradedUnits::create([
           'user_id' => $request->input('user_id'),
           'date' => $request->input('date'),
           'received_from' => $request->input('received_from'),
           'postal_address' => $request->input('postal_address'),
           'amount' => $request->input('amount'),
           'price' => $price,
           'added_by' => $request->input('added_by'),
           'uid' => $request->input('uid'),
           'car_year' => $request->input('car_year'),
           'car_make' => $request->input('car_make'),
           'car_model' => $request->input('car_model'),
           'car_variant' => $request->input('car_variant'),
           'car_price' => $car_price,
           'car_plate_no' => $request->input('car_plate_no'),
           'image' => $request->input('image'),
           'agreed_price' => $agreedPrice,
           'balance' => $balance,
           'deposit' => $deposit,
           'due_date' => $request->input('due_date'),
           'checkboxes' => json_encode($request->input('required_docs')),
           'unit_year' => $request->input('unit_year'),
           'unit_make' => $request->input('unit_make'),
           'unit_model' => $request->input('unit_model'),
           'unit_variant' => $request->input('unit_variant'),
           'unit_price' => $unit_price,
           'unit_plate_no' => $request->input('unit_plate_no'),
           'checkboxes2' => json_encode($request->input('required_docs2')),
           'first_name' => $request->input('first_name'),
           'last_name' => $request->input('last_name'),
           'contact' => $request->input('contact'),
           'witness' => $request->input('witness'),
           'client_name' => $request->input('client_name'),
           'client_contact' => $request->input('client_contact'),
           'transaction_type' => $request->input('transaction_type'),
       ]);

        // Clone and store in SoldUnits table
           $appointmentInfo = new Soldunits();
           $appointmentInfo->fill($arInfo->toArray());
           $appointmentInfo->save();

           $appointmentToDelete = TradesStatuses::find($request->input('id'));
           if ($appointmentToDelete) {
               $appointmentToDelete->delete();
           }

       return redirect()->route('system.trade_in.status')->with('success', 'Acknowledgment Receipt (Traded) stored successfully');
   
    }


    public function traded(){
        $tradedUnits = TradedUnits::paginate(10);

        foreach ($tradedUnits as $trade) {
            $tradeImages = [];

            // Loop through each image column and convert them to image URLs
            for ($i = 1; $i <= 6; $i++) {
                $columnName = 'photo_' . $i;
                $imagePaths = $trade->$columnName;

                if (is_array($imagePaths)) {
                    // Loop through each image path and convert them to URLs
                    foreach ($imagePaths as $imagePath) {
                        $fullImagePath = storage_path('app/public/' . $imagePath);

                        if (File::exists($fullImagePath)) {
                            $imageUrl = url('storage/' . $imagePath);
                            $tradeImages[] = $imageUrl;
                        }
                    }
                } elseif (is_string($imagePaths)) {
                    // Handle the case where the column contains a single image path (string)
                    $fullImagePath = storage_path('app/public/' . $imagePaths);

                    if (File::exists($fullImagePath)) {
                        $imageUrl = url('storage/' . $imagePaths);
                        $tradeImages[] = $imageUrl;
                    }
                }
            }
            $trade->images = $tradeImages;
        }

        return view('system.trade-in.traded', compact('tradedUnits'));
    }

}
