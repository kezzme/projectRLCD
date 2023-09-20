<?php

namespace App\Http\Controllers;

use App\Models\Soldunits;
use Illuminate\Http\Request;
use App\Models\ReceiptRecords;
use App\Models\FinancingStatuses;
use App\Models\FinancingConfirmations;
use App\Models\ReservationFinancings;
use Illuminate\Support\Facades\Crypt;

class FinancingController extends Controller
{
   public function fiConfirmation(){
    return view('system.financing.confirmation', ['financing_confirmations' => ReservationFinancings::paginate(10)]);
   }
  

   public function toReceipt(Request $request, $id){
      
      $toReceipt = ReservationFinancings::find($id);

      $checkboxes = [
         'LTO OFFICIAL RECEIPT',
         'PHOTO OF ID\'S WITH SIGNATURE',
         'LTO CERTIFICATE OF REGISTRATION',
         'SECRETARY\'S CERTIFICATE',
         'DEDD OF SALES',
         'RELEASE OF CHATTLEMORTGAGE',
     ];
      
      $toStatus = [
          'financing_bank' => $request->input('financing_bank'),
          'status' => $request->input('status')
      ];

        return view('system.financing.receipt', compact('toReceipt', 'checkboxes', 'toStatus'));
      }


      public function toStatus(Request $request, $id) {
        $financing_confirmation = ReservationFinancings::find($id);
  
        if ($financing_confirmation) {
            $finStatusTable = new FinancingStatuses;
            $finStatusTable->fill($financing_confirmation->toArray());
            $finStatusTable->financing_bank = $request->input('financing_bank');
            $finStatusTable->status = $request->input('status');
            $finStatusTable->save();
    
            $financing_confirmation->delete();
        }
  
        if ($request->input('status') === 'Rejected') {
           $uid = $financing_confirmation->uid;
           $user_id = $financing_confirmation->user_id;
           $firstname = $financing_confirmation->first_name;
           $lastname = $financing_confirmation->last_name;
   
           ReceiptRecords::where('uid', $uid)
               ->where('user_id', $user_id)
               ->where('first_name', $firstname)
               ->where('last_name', $lastname)
               ->delete();
        } 
        return redirect()->route('system.financing.confirmation')->with('success', 'Financing Confirmation (Rejected) stored successfully');
    }


      public function toSold(Request $request, $id){
        $price = str_replace(',', '', $request->input('price'));
        $agreedPrice = str_replace(',', '', $request->input('agreed_price'));
    
        $fcInfo = ReceiptRecords::create([
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
            'balance' => $request->input('balance'),
            'deposit' => $request->input('deposit'),
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
            $soldUnitInfo->fill($fcInfo->toArray());
            $soldUnitInfo->transaction_type = 'financing';
            $soldUnitInfo->save();

            $toStatusTable = new FinancingStatuses();
             $toStatusTable->fill($fcInfo->toArray());
             $toStatusTable->financing_bank = $request->input('financing_bank');
             $toStatusTable->status = $request->input('status');
             $toStatusTable->save();
            
            $reservationToDelete = ReservationFinancings::find($id);
            if ($reservationToDelete) {
                $reservationToDelete->delete();
            }

        return redirect()->route('system.financing.confirmation')->with('success', 'Acknowledgment Receipt (Sold) stored successfully');
    }
   

   public function fiStatus(){
    return view('system.financing.status', ['financing_statuses' => FinancingStatuses::paginate(10)]);
   }
}

