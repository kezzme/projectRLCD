<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\ReceiptRecords;
use App\Models\Soldunits;
use App\Models\User;
use App\Models\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiptsController extends Controller
{
    public function ackReceipts(){
        $units = Units::all();
    
            $idNumber = ReceiptRecords::max('user_id');
            $tnxNumber = ReceiptRecords::max('TNX_No');
    
            $checkboxes = [
                'LTO OFFICIAL RECEIPT',
                'PHOTO OF ID\'S WITH SIGNATURE',
                'LTO CERTIFICATE OF REGISTRATION',
                'SECRETARY\'S CERTIFICATE',
                'DEDD OF SALES',
                'RELEASE OF CHATTLEMORTGAGE',
            ];
    
            if($idNumber === null){
                $nextidNumber = 1001001;
            } else{
                $nextidNumber = $idNumber + 1;
            }
    
            if($tnxNumber === null){
                $nextTnxNo = 1002023001;
            } else {
                $nextTnxNo = $tnxNumber + 1;
            }

            while (ReceiptRecords::where('id', $nextidNumber)->exists()) {
                $nextidNumber++;
            }
            
            while (ReceiptRecords::where('TNX_No', $nextTnxNo)->exists()) {
                $nextTnxNo++;
            }
            return view('system.receipts.acknowledgment', compact('units', 'checkboxes', 'nextidNumber', 'nextTnxNo'));
        } 


    public function records(){
        return view('system.receipts.records', ['acknowledgment_receipt'=> ReceiptRecords::paginate(10)]);
    }

    public function store(Request $request) {
        $action = $request->input('action');

        if ($action === 'SOLD') {
            return redirect()->route('system.receipts.toSold');
        } elseif ($action === 'RESERVED') {
            return redirect()->route('system.receipts.toAppointment');
        }
        return back()->with('success', 'Record stored successfully');
    }


    public function toSold(Request $request){
        $price = str_replace(',', '', $request->input('price'));
        $agreedPrice = str_replace(',', '', $request->input('agreed_price'));
        $balance = str_replace(',', '', $request->input('balance'));
        $deposit = str_replace(',', '', $request->input('deposit'));
    
        $arInfo = ReceiptRecords::create([
            'user_id' => $request->input('user_id'),
            'TNX_No' => $request->input('TNX_No'),
            'date' => $request->input('date'),
            'received_from' => $request->input('received_from'),
            'postal_address' => $request->input('postal_address'),
            'amount' => $request->input('amount'),
            'price' => $price,
            'uid' => $request->input('uid'),
            'car_year' => $request->input('car_year'),
            'car_make' => $request->input('car_make'),
            'car_model' => $request->input('car_model'),
            'car_variant' => $request->input('car_variant'),
            'exterior_color' => $request->input('exterior_color'),
            'car_price' => $request->input('car_price'),
            'car_plate_no' => $request->input('car_plate_no'),
            'image' => $request->input('image'),
            'agreed_price' => $agreedPrice,
            'balance' => $balance,
            'deposit' => $deposit,
            'due_date' => $request->input('due_date'),
            'checkboxes' => json_encode($request->input('required_docs')),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'contact' => $request->input('contact'),
            'witness' => $request->input('witness'),
            'client_name' => $request->input('client_name'),
            'client_contact' => $request->input('client_contact'),
        ]);

         // Clone and store in SoldUnits table
            $soldUnitInfo = new SoldUnits(); // Create a new instance of SoldUnits model
            $soldUnitInfo->fill($arInfo->toArray()); // Fill the attributes from the cloned instance
            $soldUnitInfo->car_price = str_replace(',', '', $request->input('agreed_price')); // Modify specific attribute
            $soldUnitInfo->save();

        return back()->with('success', 'Acknowledgment Receipt stored successfully');
    }

    public function toAppointment(Request $request){
        $price = str_replace(',', '', $request->input('price'));
        $agreedPrice = str_replace(',', '', $request->input('agreed_price'));
        $balance = str_replace(',', '', $request->input('balance'));
        $deposit = str_replace(',', '', $request->input('deposit'));
    
        $arInfo = ReceiptRecords::create([
            'user_id' => $request->input('user_id'),
            'TNX_No' => $request->input('TNX_No'),
            'date' => $request->input('date'),
            'received_from' => $request->input('received_from'),
            'postal_address' => $request->input('postal_address'),
            'amount' => $request->input('amount'),
            'price' => $price,
            'uid' => $request->input('uid'),
            'car_year' => $request->input('car_year'),
            'car_make' => $request->input('car_make'),
            'car_model' => $request->input('car_model'),
            'car_variant' => $request->input('car_variant'),
            'exterior_color' => $request->input('exterior_color'),
            'car_price' => $request->input('car_price'),
            'car_plate_no' => $request->input('car_plate_no'),
            'image' => $request->input('image'),
            'agreed_price' => $agreedPrice,
            'balance' => $balance,
            'deposit' => $deposit,
            'due_date' => $request->input('due_date'),
            'checkboxes' => json_encode($request->input('required_docs')),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'contact' => $request->input('contact'),
            'witness' => $request->input('witness'),
            'client_name' => $request->input('client_name'),
            'client_contact' => $request->input('client_contact'),
        ]);

         // Clone and store in SoldUnits table
            $appointmentInfo = new Appointments();
            $appointmentInfo->fill($arInfo->toArray());
            $appointmentInfo->car_price = str_replace(',', '', $request->input('agreed_price'));
            $appointmentInfo->save();

        return back()->with('success', 'Acknowledgment Receipt stored successfully');
    }

}
