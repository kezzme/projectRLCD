<?php

namespace App\Http\Controllers;

use App\Models\AutoDetailingPayments;
use App\Models\AutoDetailingRecords;
use Illuminate\Http\Request;
use App\Models\AutoDetailings;
use Illuminate\Support\Facades\File;

class SystemAutoDetailingController extends Controller
{
    public function confirmation(){
        $auto_detailing = AutoDetailings::paginate(10);

        foreach ($auto_detailing as $auto) {
            $autoImages = [];

            // Loop through each image column and convert them to image URLs
            for ($i = 1; $i <= 6; $i++) {
                $columnName = 'photo_' . $i;
                $imagePaths = $auto->$columnName;

                if (is_array($imagePaths)) {
                    // Loop through each image path and convert them to URLs
                    foreach ($imagePaths as $imagePath) {
                        $fullImagePath = storage_path('app/public/' . $imagePath);

                        if (File::exists($fullImagePath)) {
                            $imageUrl = url('storage/' . $imagePath);
                            $autoImages[] = $imageUrl;
                        }
                    }
                } elseif (is_string($imagePaths)) {
                    // Handle the case where the column contains a single image path (string)
                    $fullImagePath = storage_path('app/public/' . $imagePaths);

                    if (File::exists($fullImagePath)) {
                        $imageUrl = url('storage/' . $imagePaths);
                        $autoImages[] = $imageUrl;
                    }
                }
            }
            $auto->images = $autoImages;
        }

        return view('system.auto-detailing.confirmation', compact('auto_detailing'));
    }

    public function phase_1($id){
        $toVoid = AutoDetailings::find($id);
        dd($toVoid);
        if($toVoid){
            $toVoid->delete();
        }
    }

    public function phase_2($id){
        $toVoid = AutoDetailingPayments::find($id);
        dd($toVoid);
        if($toVoid){
            $toVoid->delete();
        }
    }

    public function toPayment($id){
        $auto_detailing = AutoDetailings::find($id);
        

        if ($auto_detailing) {
            $toPaymentTable = new AutoDetailingPayments();
            $toPaymentTable->fill($auto_detailing->toArray());
            $toPaymentTable->save();
    
            $auto_detailing->delete();
            
            return back()->with('success', 'Auto Detailing transferred successfully');
        }
    
        return back()->with('error', 'Auto Detailing not found.');
    }

    
    public function payment(){
        return view('system.auto-detailing.payment', ['payments'=> AutoDetailingPayments::paginate(10)]);
    }


    public function toRecords(Request $request, $id){
        $payment = AutoDetailingPayments::find($id);

        if ($payment) {
            $amount = str_replace(',', '', $request->input('amount'));
            $request->merge(['amount' => $amount]);

            $toRecordTable = new AutoDetailingRecords();
            $toRecordTable->fill($payment->toArray());
            $toRecordTable->amount =  $amount;
            $toRecordTable->save();
    
            $payment->delete();
            
            return back()->with('success', 'Auto Detailing Payment transferred successfully');
        }
    
        return back()->with('error', 'Auto Detailing Payment not found.');
    }


    public function records(){
        return view('system.auto-detailing.records', ['auto_detailing_records' => AutoDetailingRecords::paginate(10)]);
    }
}
