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
    // public function reservation(){
    //     $reservation = ReservationCashes::paginate(10);
    //     return view('system.reservation.index', ['reservation' => $reservation]);
    // }

    public function resCash(){
        $reservation = ReservationCashes::paginate(10);
        return view('system.reservation.cash', ['reservation' => $reservation]);
    }

    public function tocashReceipt($id){
        $cashReceipt = ReservationCashes::find($id);

        $checkboxes = [
            'LTO OFFICIAL RECEIPT',
            'PHOTO OF ID\'S WITH SIGNATURE',
            'LTO CERTIFICATE OF REGISTRATION',
            'SECRETARY\'S CERTIFICATE',
            'DEDD OF SALES',
            'RELEASE OF CHATTLEMORTGAGE',
        ];

        return view('system.reservation.cashReceipt', compact('cashReceipt', 'checkboxes'));
    }


    public function resFinancing(){
        $reservation = ReservationFinancings::paginate(10);
        return view('system.reservation.financing', ['reservation' => $reservation]);
    }

    public function recFinancing($id){
        $toReceipt = ReservationFinancings::find($id);

        $checkboxes = [
            'LTO OFFICIAL RECEIPT',
            'PHOTO OF ID\'S WITH SIGNATURE',
            'LTO CERTIFICATE OF REGISTRATION',
            'SECRETARY\'S CERTIFICATE',
            'DEDD OF SALES',
            'RELEASE OF CHATTLEMORTGAGE',
        ];

        return view('system.reservation.financingReceipt', compact('financingReceipt', 'checkboxes'));
    }


    public function resTradein(){
        $reservation = ReservationTradeIns::paginate(10);
        return view('system.reservation.trade-in', ['reservation' => $reservation]);
    }

    public function recTrade($id){
        $toReceipt = ReservationTradeIns::find($id);

        $checkboxes = [
            'LTO OFFICIAL RECEIPT',
            'PHOTO OF ID\'S WITH SIGNATURE',
            'LTO CERTIFICATE OF REGISTRATION',
            'SECRETARY\'S CERTIFICATE',
            'DEDD OF SALES',
            'RELEASE OF CHATTLEMORTGAGE',
        ];

        return view('system.reservation.receipt', compact('tradeReceipt', 'checkboxes'));
    }

   

   


    public function reserveStore(Request $request){
        $action = $request->input('action');

        if ($action === 'SOLD') {
            return redirect()->route('system.reservations.toSoldunits');
        } elseif ($action === 'FINANCING') {
            return redirect()->route('system.appointments.toReservation');
        } elseif ($action === 'PARTIAL') {
            return redirect()->route('system.appointments.toReservation');
        }
        return back()->with('success', 'Record stored successfully');
    }


    
    public function toSoldunits(Request $request, $id)
    {
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

            $soldUnitInfo = new SoldUnits(); 
            $soldUnitInfo->fill($arInfo->toArray());
            // $soldUnitInfo->car_price = str_replace(',', '', $request->input('agreed_price'));
            $soldUnitInfo->transaction_type = $request->input('transaction_type');
            $soldUnitInfo->save();

            $reservationDelete = Reservations::find($id);
            if ($reservationDelete) {
                $reservationDelete->delete();
            }

        return redirect()->route('system.reservations.reservation')->with('success', 'Acknowledgment Receipt (Sold) stored successfully');
    }


    public function toFinancing($id)
    {
        $appointment = Reservations::find($id);

        if($appointment){
            $financingTable = new FinancingConfirmations;
            $financingTable->fill($appointment->toArray());
            $financingTable->save();

            $appointment->delete();

            return back()->with('success', 'Appointment transferred successfully');
        }

        return back()->with('error', 'Appointment not found.');
    }
}
