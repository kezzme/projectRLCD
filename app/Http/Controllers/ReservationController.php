<?php

namespace App\Http\Controllers;

use App\Models\Soldunits;
use App\Models\Appointments;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Models\ReceiptRecords;
use App\Models\FinancingConfirmations;
use App\Models\ReservationCashes;
use App\Models\ReservationFinancings;
use App\Models\ReservationTradeIns;

class ReservationController extends Controller
{

    public function resCash(){
        $resCash = ReservationCashes::paginate(10);
        return view('system.reservation.cash', ['resCash' => $resCash]);
    }

    public function resTradein(){
        $resTrade = ReservationTradeIns::paginate(10);
        return view('system.reservation.trade-in', ['resTrade' => $resTrade]);
    }


    public function cashReceipt($id)
    {
        $toReceipt = ReservationCashes::find($id);

        $checkboxes = [
            'LTO OFFICIAL RECEIPT',
            'PHOTO OF ID\'S WITH SIGNATURE',
            'LTO CERTIFICATE OF REGISTRATION',
            'SECRETARY\'S CERTIFICATE',
            'DEDD OF SALES',
            'RELEASE OF CHATTLEMORTGAGE',
        ];

        return view('system.reservation.receiptCash', compact('toReceipt', 'checkboxes'));
    }

    public function cashVoid($id){
        $void = ReservationCashes::find($id);
       
        if($void){
            $void->delete();
        }

        return back()->with('success', 'Reservation (Cash) void successfully');
    }

    public function cashSold(Request $request){
        $price = str_replace(',', '', $request->input('price'));
        $agreedPrice = str_replace(',', '', $request->input('agreed_price'));
        $balance = str_replace(',', '', $request->input('balance'));
        $deposit = str_replace(',', '', $request->input('deposit'));
    
        $cashInfo = ReceiptRecords::create([
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
            $soldUnitInfo = new Soldunits(); 
            $soldUnitInfo->fill($cashInfo->toArray()); 
            $soldUnitInfo->transaction_type = "cash";
            $soldUnitInfo->save();

            $reservationToDelete = ReservationCashes::find($request->input('id'));
            if ($reservationToDelete) {
                $reservationToDelete->delete();
            }

            return redirect()->route('system.reservations.resCash')->with('success', 'Acknowledgment Receipt (Sold) stored successfully');
    }

    public function cashReservation(Request $request, $id){
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

            $appointmentToDelete = ReservationCashes::find($id);
            if ($appointmentToDelete) {
                $appointmentToDelete->delete();
            }

        return redirect()->route('system.reservations.resCash')->with('success', 'Acknowledgment Receipt (Partial) stored successfully');
    }


    public function financingReceipt($id)
    {
        $toReceipt = ReservationTradeIns::find($id);

        $checkboxes = [
            'LTO OFFICIAL RECEIPT',
            'PHOTO OF ID\'S WITH SIGNATURE',
            'LTO CERTIFICATE OF REGISTRATION',
            'SECRETARY\'S CERTIFICATE',
            'DEDD OF SALES',
            'RELEASE OF CHATTLEMORTGAGE',
        ];

        return view('system.reservation.receiptCash', compact('toReceipt', 'checkboxes'));
    }


    public function financingSold(Request $request){
        $price = str_replace(',', '', $request->input('price'));
        $agreedPrice = str_replace(',', '', $request->input('agreed_price'));
        $balance = str_replace(',', '', $request->input('balance'));
        $deposit = str_replace(',', '', $request->input('deposit'));
    
        $cashInfo = ReceiptRecords::create([
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
            $soldUnitInfo = new Soldunits(); 
            $soldUnitInfo->fill($cashInfo->toArray()); 
            $soldUnitInfo->transaction_type = "cash";
            $soldUnitInfo->save();

            $reservationToDelete = ReservationTradeIns::find($request->input('id'));
            if ($reservationToDelete) {
                $reservationToDelete->delete();
            }

            return redirect()->route('system.reservations.resCash')->with('success', 'Acknowledgment Receipt (Sold) stored successfully');
    }

    
}
