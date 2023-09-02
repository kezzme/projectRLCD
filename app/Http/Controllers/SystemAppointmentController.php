<?php

namespace App\Http\Controllers;

use App\Models\Units;
use App\Models\Soldunits;
use App\Models\Appointments;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Models\ReceiptRecords;
use App\Models\FinancingConfirmations;
use Illuminate\Support\Facades\Redirect;

class SystemAppointmentController extends Controller
{
    public function appointments(){
        $appointments = Appointments::paginate(10);
        return view('system.appointment.index', ['appointments' => $appointments]);
    }

    public function store(Request $request) {
        $action = $request->input('action');

        if ($action === 'SOLD') {
            return redirect()->route('system.receipts.toSold');
        } elseif ($action === 'RESERVED') {
            return redirect()->route('system.appointments.toReservation');
        }
        return back()->with('success', 'Record stored successfully');
    }

    public function toReceipt($id)
    {
        $toReceipt = Appointments::find($id);

        $checkboxes = [
            'LTO OFFICIAL RECEIPT',
            'PHOTO OF ID\'S WITH SIGNATURE',
            'LTO CERTIFICATE OF REGISTRATION',
            'SECRETARY\'S CERTIFICATE',
            'DEDD OF SALES',
            'RELEASE OF CHATTLEMORTGAGE',
        ];

        return view('system.appointment.receipt', compact('toReceipt', 'checkboxes'));
    }

    public function toVoid($id){
        $void = Appointments::find($id);
       
        if($void){
            $void->delete();

            return back()->with('success', 'Appointment void successfully');
        }
        return back()->with('error', 'Auto Detailing not found.');
    }

    // public function toSoldunits($id)
    // {
    //     $appointment = Appointments::find($id);
        
    //     if ($appointment) {
    //         $soldUnitsTable = new Soldunits;
    //         $soldUnitsTable->fill($appointment->toArray());
    //         $soldUnitsTable->save();
    
    //         $appointment->delete();

    //         Appointments::where('uid', '$uid')->delete();
            
    //         // Units::where('uid', '$uid')->delete();

            
    
    //         return back()->with('success', 'Appointment transferred successfully');
    //     }
    
    //     return back()->with('error', 'Appointment not found.');
    // }

    // public function toFinancing($id)
    // {
    //     $appointment = Appointments::find($id);

    //     if($appointment){
    //         $financingTable = new FinancingConfirmations;
    //         $financingTable->fill($appointment->toArray());
    //         $financingTable->save();

    //         $appointment->delete();

    //         return back()->with('success', 'Appointment transferred successfully');
    //     }

    //     return back()->with('error', 'Appointment not found.');
    // }
    
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
            'transaction_type' => $request->input('transaction_type'),
        ]);

         // Clone and store in SoldUnits table
            $soldUnitInfo = new Soldunits(); // Create a new instance of SoldUnits model
            $soldUnitInfo->fill($arInfo->toArray()); // Fill the attributes from the cloned instance
            $soldUnitInfo->car_price = str_replace(',', '', $request->input('agreed_price')); // Modify specific attribute
            $soldUnitInfo->transaction_type = $request->input('transaction_type');
            $soldUnitInfo->save();

            $appointmentToDelete = Appointments::find($request->input('id'));
            if ($appointmentToDelete) {
                $appointmentToDelete->delete();
            }

            return redirect()->route('system.appointments.appointments')->with('success', 'Acknowledgment Receipt (Sold) stored successfully');
    }
   

    public function toReservation(Request $request){
        // dd($request);
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
            $appointmentInfo = new Reservations();
            $appointmentInfo->fill($arInfo->toArray());
            $appointmentInfo->car_price = str_replace(',', '', $request->input('agreed_price'));
            $appointmentInfo->save();

            $appointmentToDelete = Appointments::find($request->input('id'));
            if ($appointmentToDelete) {
                $appointmentToDelete->delete();
            }

        return redirect()->route('system.appointments.appointments')->with('success', 'Acknowledgment Receipt (Reserved) stored successfully');
    }

}