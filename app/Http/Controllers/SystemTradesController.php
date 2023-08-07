<?php

namespace App\Http\Controllers;

use App\Models\Trades;
use App\Models\Soldunits;
use App\Models\TradedUnits;
use Illuminate\Http\Request;
use App\Models\TradesStatuses;
use Illuminate\Support\Facades\File;

class SystemTradesController extends Controller
{
    public function tiRequests()
    {
        $trades = Trades::paginate(10);

        foreach ($trades as $trade) {
            $tradeImages = [];

            // Loop through each image column and convert them to image URLs
            for ($i = 1; $i <= 6; $i++) {
                $columnName = 'photo_' . $i;
                $imagePaths = $trade->$columnName;

                if (is_array($imagePaths)) {
                    // Loop through each image path and convert them to URLs
                    foreach ($imagePaths as $imagePath) {
                        $fullImagePath = storage_path('app/public/' . $imagePath);

                        if (File::exists($fullImagePath)) {
                            $imageUrl = url('storage/' . $imagePath);
                            $tradeImages[] = $imageUrl;
                        }
                    }
                } elseif (is_string($imagePaths)) {
                    // Handle the case where the column contains a single image path (string)
                    $fullImagePath = storage_path('app/public/' . $imagePaths);

                    if (File::exists($fullImagePath)) {
                        $imageUrl = url('storage/' . $imagePaths);
                        $tradeImages[] = $imageUrl;
                    }
                }
            }
            $trade->images = $tradeImages;
        }

        return view('system.trade-in.requests', compact('trades'));
    }


    public function phase1($id){
        $trades = Trades::find($id);
      
        if($trades){
            $trades->delete();
        }

        // Mail::to($cwInfo->userCarWashes->email)->send(new BookingMail($details, 'services.mail'));
        return back()->with('success', 'The trade-in request has been rejected successfully');
    }

    public function phase2($id){
        $trades = Trades::find($id);
        dd($trades->all());
        if($trades){
            $trades->delete();
        }

        // Mail::to($cwInfo->userCarWashes->email)->send(new BookingMail($details, 'services.mail'));
        return back()->with('success', 'The trade-in request has been rejected successfully');
    }

    public function toStatus($id){
        $trades = Trades::find($id);
        
        
        if ($trades) {
            $toStatusTable = new TradesStatuses();
            $toStatusTable->fill($trades->toArray());
            $toStatusTable->save();
    
            $trades->delete();


            // Units::where('uid', '$uid')->delete();

    
            return back()->with('success', 'Trade-in Request transferred successfully');
        }
    
        return back()->with('error', 'Trade-in not found.');
    }



    public function status(){
        $tiStatuses = TradesStatuses::paginate(10);

        foreach ($tiStatuses as $status) {
            $tradeImages = [];

            // Loop through each image column and convert them to image URLs
            for ($i = 1; $i <= 6; $i++) {
                $columnName = 'photo_' . $i;
                $imagePaths = $status->$columnName;

                if (is_array($imagePaths)) {
                    // Loop through each image path and convert them to URLs
                    foreach ($imagePaths as $imagePath) {
                        $fullImagePath = storage_path('app/public/' . $imagePath);

                        if (File::exists($fullImagePath)) {
                            $imageUrl = url('storage/' . $imagePath);
                            $tradeImages[] = $imageUrl;
                        }
                    }
                } elseif (is_string($imagePaths)) {
                    // Handle the case where the column contains a single image path (string)
                    $fullImagePath = storage_path('app/public/' . $imagePaths);

                    if (File::exists($fullImagePath)) {
                        $imageUrl = url('storage/' . $imagePaths);
                        $tradeImages[] = $imageUrl;
                    }
                }
            }
            $status->images = $tradeImages;
        }

        return view('system.trade-in.status', ['tiStatuses' => $tiStatuses]);
    }

    public function toTraded($id){
        $tiStatuses = TradesStatuses::find($id);
       

        if($tiStatuses){
            $toTradedTable = new TradedUnits();
            $toTradedTable->fill($tiStatuses->toArray());
            $toTradedTable->save();

            // Clone the $financing_confirmation object for the Soldunits model
            $cloned_tiStatuses = clone $tiStatuses;
            
            // Create a new Soldunits model and fill with data from the cloned object
            $toSoldtable = new Soldunits;
            $toSoldtable->fill($cloned_tiStatuses->toArray());
            $toSoldtable->save();

            //Units::where('uid', '$uid')->delete();

            $tiStatuses->delete();

            return back()->with('success', 'Trade-in Status transferred successfully');
        }
        return back()->with('error', 'Trade-in not found.');
    }


    public function traded(){
        $tradedUnits = TradedUnits::paginate(10);

        foreach ($tradedUnits as $trade) {
            $tradeImages = [];

            // Loop through each image column and convert them to image URLs
            for ($i = 1; $i <= 6; $i++) {
                $columnName = 'photo_' . $i;
                $imagePaths = $trade->$columnName;

                if (is_array($imagePaths)) {
                    // Loop through each image path and convert them to URLs
                    foreach ($imagePaths as $imagePath) {
                        $fullImagePath = storage_path('app/public/' . $imagePath);

                        if (File::exists($fullImagePath)) {
                            $imageUrl = url('storage/' . $imagePath);
                            $tradeImages[] = $imageUrl;
                        }
                    }
                } elseif (is_string($imagePaths)) {
                    // Handle the case where the column contains a single image path (string)
                    $fullImagePath = storage_path('app/public/' . $imagePaths);

                    if (File::exists($fullImagePath)) {
                        $imageUrl = url('storage/' . $imagePaths);
                        $tradeImages[] = $imageUrl;
                    }
                }
            }
            $trade->images = $tradeImages;
        }

        return view('system.trade-in.traded', compact('tradedUnits'));
    }

}
