<?php

namespace App\Http\Controllers;

use App\Models\Soldunits;
use Illuminate\Http\Request;
use App\Models\ReceiptRecords;
use App\Models\FinancingStatuses;
use App\Models\FinancingConfirmations;

class FinancingController extends Controller
{
   public function fiConfirmation(){
    return view('system.financing.confirmation', ['financing_confirmations' => FinancingConfirmations::paginate(10)]);
   }

   public function toStatus(Request $request, $id) {
      $financing_confirmation = FinancingConfirmations::find($id);
  
      if ($financing_confirmation) {
          $finStatusTable = new FinancingStatuses;
          $finStatusTable->fill($financing_confirmation->toArray());
          $finStatusTable->financing_bank = $request->input('financing_bank');
          $finStatusTable->status = $request->input('status');
        
          $finStatusTable->save();
        
         $cloned_confirmation = clone $financing_confirmation;
         
          $toSoldtable = new Soldunits;
          $toSoldtable->fill($cloned_confirmation->toArray());
          $toSoldtable->save();
  
          $financing_confirmation->delete();
  
      }

      if ($request->input('status') === 'Rejected') {
         $uid = $financing_confirmation->uid;
         $firstname = $financing_confirmation->first_name;
         $lastname = $financing_confirmation->last_name;
 
         ReceiptRecords::where('uid', $uid)
             ->where('first_name', $firstname)
             ->where('last_name', $lastname)
             ->delete();
      }
      return back()->with('success', 'Transferred successfully.');
  }
  

   public function toSold(Request $request, $id){
      // dd($request->all(), $id);
      $financing_confirmation = FinancingConfirmations::find($id);

      if ($financing_confirmation) {
         $finStatusTable = new FinancingStatuses;
         $finStatusTable->fill($financing_confirmation->toArray());
         $finStatusTable->financing_bank = $request->input('financing_bank');
         $finStatusTable->status = $request->input('status');
         $finStatusTable->save();

         $cloned_confirmation = clone $financing_confirmation;
         
         $toSoldtable = new Soldunits;
         $toSoldtable->fill($cloned_confirmation->toArray());
         $toSoldtable->transaction_type = $request->input('transaction_type');
         $toSoldtable->save();

         //Units::where('uid', '$uid')->delete();

         $financing_confirmation->delete();

         return back()->with('success', 'Transferred successfully.');
      }
   }

   public function fiStatus(){
    return view('system.financing.status', ['financing_statuses' => FinancingStatuses::paginate(10)]);
   }
}
