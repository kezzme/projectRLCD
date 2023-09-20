<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Units;
use App\Models\Soldunits;
use App\Models\TradedUnits;
use App\Models\Appointments;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Models\ReceiptRecords;
use App\Models\ReservationCashes;
use Illuminate\Support\Facades\DB;
use App\Models\ReservationTradeIns;
use App\Models\ReservationFinancings;
use App\Models\FinancingConfirmations;
use App\Models\ReceiptTradeInRecords;

class ReceiptsController extends Controller
{
    public function ackReceipts(){
        $units = Units::all();
    
            $idNumber = ReceiptRecords::max('user_id');
    
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
    
            while (ReceiptRecords::where('id', $nextidNumber)->exists()) {
                $nextidNumber++;
            }
            
            return view('system.receipts.acknowledgment', compact('units', 'checkboxes', 'nextidNumber'));
        } 

        public function tradeinForm(){
            $units = Units::all();
    
            $idNumber = TradedUnits::max('user_id');

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
            
            if($idNumber === null){
                $nextidNumber = 2001001;
            } else{
                $nextidNumber = $idNumber + 1;
            }
    
            while (TradedUnits::where('id', $nextidNumber)->exists()) {
                $nextidNumber++;
            }

            return view('system.receipts.trade-inForm', compact('units', 'checkboxes', 'checkboxes2', 'nextidNumber'));
        } 


        public function totiReservation(Request $request){
            $price = str_replace(',', '', $request->input('price'));
            $car_price = str_replace(',', '', $request->input('car_price'));
            $unit_price = str_replace(',', '', $request->input('unit_price'));
            $agreedPrice = str_replace(',', '', $request->input('agreed_price'));
            $balance = str_replace(',', '', $request->input('balance'));
            $deposit = str_replace(',', '', $request->input('deposit'));
        
            $arInfo = ReservationTradeIns::create([
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
            ]);
     
                $tradeInfo = new ReceiptTradeInRecords();
                $tradeInfo->fill($arInfo->toArray());
                $tradeInfo->save();
     
            return redirect()->route('system.receipts.tradeinForm')->with('success', 'Acknowledgment Receipt (Reserved: Trade-in) stored successfully');
         }


         public function totiTraded(Request $request){
            $price = str_replace(',', '', $request->input('price'));
            $car_price = str_replace(',', '', $request->input('car_price'));
            $unit_price = str_replace(',', '', $request->input('unit_price'));
            $agreedPrice = str_replace(',', '', $request->input('agreed_price'));
            $balance = str_replace(',', '', $request->input('balance'));
            $deposit = str_replace(',', '', $request->input('deposit'));
        
            $arInfo = ReceiptTradeInRecords::create([
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
            ]);
     
                $tradeInfo = new TradedUnits();
                $tradeInfo->fill($arInfo->toArray());
                $tradeInfo->save();
     
     
            return redirect()->route('system.receipts.tradeinForm')->with('success', 'Acknowledgment Receipt (Traded) stored successfully');
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
            $soldUnitInfo = new SoldUnits(); 
            $soldUnitInfo->fill($arInfo->toArray());
            // $soldUnitInfo->car_price = str_replace(',', '', $request->input('agreed_price'));
            $soldUnitInfo->transaction_type = 'cash';
            $soldUnitInfo->save();

        return back()->with('success', 'Acknowledgment Receipt (Sold) stored successfully');
    }

    public function toFinancing(Request $request){
        $price = str_replace(',', '', $request->input('price'));
        $agreedPrice = str_replace(',', '', $request->input('agreed_price'));
        $balance = str_replace(',', '', $request->input('balance'));
        $deposit = str_replace(',', '', $request->input('deposit'));
    
        $arInfo = ReceiptRecords::create([
            'user_id' => $request->input('user_id'),
            
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

         // Clone and store in Reservation -> Financing
            $reserveInfo = new ReservationFinancings();
            $reserveInfo->fill($arInfo->toArray());
            $reserveInfo->save();

         // Clone and store in Financing -> Confirmations
            $reserveInfo = new FinancingConfirmations();
            $reserveInfo->fill($arInfo->toArray());
            $reserveInfo->transaction_type = "financing";
            $reserveInfo->save();

            return back()->with('success', 'Acknowledgment Receipt (Financing) stored successfully');
    }


    public function toReservation(Request $request){
        $price = str_replace(',', '', $request->input('price'));
        $agreedPrice = str_replace(',', '', $request->input('agreed_price'));
        $balance = str_replace(',', '', $request->input('balance'));
        $deposit = str_replace(',', '', $request->input('deposit'));
    
        $arInfo = ReceiptRecords::create([
            'user_id' => $request->input('user_id'),
            
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
            $appointmentInfo = new ReservationCashes();
            $appointmentInfo->fill($arInfo->toArray());
            $appointmentInfo->save();

        return back()->with('success', 'Acknowledgment Receipt (Reserved [Cash]) stored successfully');
    }

    public function records(){
        return view('system.receipts.records', ['acknowledgment_receipt'=> ReceiptRecords::paginate(10)]);
    }

}
