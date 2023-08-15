<?php

namespace App\Http\Controllers;

use App\Models\ReceiptRecords;
use App\Models\User;
use App\Models\Units;
use Illuminate\Http\Request;

class ReceiptsController extends Controller
{
    public function ackReceipts(){
        $units = Units::all();

        $idNumber = ReceiptRecords::max('id');

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
            $nextidNumber = $idNumber + 1001000;
        }

        if($tnxNumber === null){
            $nextTnxNo = 1002023001;
        } else {
            $nextTnxNo = $tnxNumber + 1002023000;
        }


        return view('system.receipts.acknowledgment', compact('units', 'checkboxes', 'nextidNumber', 'nextTnxNo'));
    }

    public function records(){
        return view('system.receipts.records');
    }

    public function store(Request $request) {
        $action = $request->input('action');

        if ($action === 'SOLD') {
            // Logic to store the request as SOLD
            return redirect()->route('system.receipts.toSold');
        } elseif ($action === 'RESERVED') {
            // Logic to store the request as RESERVED
            return redirect()->route('system.receipts.toAppointment');
        }
        
        // Handle other cases or provide a default redirect
        return back()->with('success', 'Record stored successfully');

    }
    

    public function toSold(Request $request){
        dd($request);
    }

    public function toAppointment(Request $request){
        dd($request);
    }

}
