<?php

namespace App\Http\Controllers;

use App\Models\PaintJobPayments;
use App\Models\PaintJobRecords;
use App\Models\PaintJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SystemPaintjobController extends Controller
{
    public function confirmation(){
        $paintjobs = PaintJobs::paginate(10);

        foreach ($paintjobs as $paint) {
            $paintImages = [];

            // Loop through each image column and convert them to image URLs
            for ($i = 1; $i <= 6; $i++) {
                $columnName = 'photo_' . $i;
                $imagePaths = $paint->$columnName;

                if (is_array($imagePaths)) {
                    // Loop through each image path and convert them to URLs
                    foreach ($imagePaths as $imagePath) {
                        $fullImagePath = storage_path('app/public/' . $imagePath);

                        if (File::exists($fullImagePath)) {
                            $imageUrl = url('storage/' . $imagePath);
                            $paintImages[] = $imageUrl;
                        }
                    }
                } elseif (is_string($imagePaths)) {
                    // Handle the case where the column contains a single image path (string)
                    $fullImagePath = storage_path('app/public/' . $imagePaths);

                    if (File::exists($fullImagePath)) {
                        $imageUrl = url('storage/' . $imagePaths);
                        $paintImages[] = $imageUrl;
                    }
                }
            }
            $paint->images = $paintImages;
        }

        return view('system.paint-job.confirmation', compact('paintjobs'));
    }

    public function phase_1($id){
        $toVoid = PaintJobs::find($id);
       
        if($toVoid){
            $toVoid->delete();

            return back()->with('success', 'Auto Detailing void successfully');
        }
        return back()->with('error', 'Auto Detailing not found.');
    }

    public function phase_2($id){
        $toVoid = PaintJobPayments::find($id);
        dd($toVoid);
        if($toVoid){
            $toVoid->delete();

            return back()->with('success', 'Auto Detailing void successfully');
        }
        return back()->with('error', 'Auto Detailing not found.');
    }

    public function toPayment($id){
        $paintjobs = PaintJobs::find($id);
        
        if ($paintjobs) {
            $toPaymentTable = new PaintJobPayments();
            $toPaymentTable->fill($paintjobs->toArray());
            $toPaymentTable->save();
    
            $paintjobs->delete();
            
            return back()->with('success', 'Auto Detailing transferred successfully');
        }
    
        return back()->with('error', 'Auto Detailing not found.');
    }

    
    public function payment(){
        return view('system.paint-job.payment', ['paintjob_payments'=> PaintJobPayments::paginate(10)]);
    }

    public function toRecords(Request $request, $id){
        $payment = PaintJobPayments::find($id);
       
        if ($payment) {
            $amount = str_replace(',', '', $request->input('amount'));
            $request->merge(['amount' => $amount]);

            $toRecordTable = new PaintJobRecords();
            $toRecordTable->fill($payment->toArray());
            $toRecordTable->panel = $request->input('panel');
            $toRecordTable->amount =  $amount;
            
            $toRecordTable->save();
           
            $payment->delete();
            
            return back()->with('success', 'Auto Detailing Payment transferred successfully');
        }
    
        return back()->with('error', 'Auto Detailing Payment not found.');
    }


    public function records(){
        return view('system.paint-job.records', ['paintjob_records' => PaintJobRecords::paginate(10)]);
    }
}