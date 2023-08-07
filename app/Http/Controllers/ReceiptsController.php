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

        $idNumber = User::max('id');

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
}
