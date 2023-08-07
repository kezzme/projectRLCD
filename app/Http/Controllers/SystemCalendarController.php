<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\AutoDetailings;
use App\Models\CarWashes;
use App\Models\PaintJobs;
use App\Models\Trades;
use Illuminate\Http\Request;

class SystemCalendarController extends Controller
{
   public function calendar(){
      $titleApp = "Appointment";  
      $appointments = Appointments::all();  
      
      $eventsArr = [];
      
      foreach ($appointments as $app) {
          $dateComponents = explode('-', $app->date);
          $year = (int) $dateComponents[0];
          $month = (int) $dateComponents[1];
          $day = (int) $dateComponents[2];
          $firstName = $app->first_name; 
          $lastName = $app->last_name;
          $make = $app->car_make;
          $model = $app->car_model;
          $time = $app->time;
  
          $full_name_with_time = $firstName . ' ' . $lastName . ' - ' . $make . ' ' . $model . ' - ' . $time;
  
          $eventsArr[] = [
              'day' => intval($day),    
              'month' => intval($month),
              'year' => intval($year),  
              'title' => $titleApp,
              'time' => $full_name_with_time,
          ];
      }

      $titleCW = "Car Wash";
      $carwashes = CarWashes::all();

      foreach ($carwashes as $cw) {
         $dateComponents = explode('-', $cw->date);
         $year = (int) $dateComponents[0];
         $month = (int) $dateComponents[1];
         $day = (int) $dateComponents[2];
         $firstName = $cw->first_name; 
         $lastName = $cw->last_name;
         $make = $cw->car_make;
         $model = $cw->car_model;
         $time = $cw->time;
 
         $full_name_with_time = $firstName . ' ' . $lastName . ' - ' . $make . ' ' . $model . ' - ' . $time;
 
         $eventsArr[] = [
             'day' => intval($day),    
             'month' => intval($month),
             'year' => intval($year),  
             'title' => $titleCW,
             'time' => $full_name_with_time,
         ];
     }


     $titleAD = "Auto Detailing";
     $autodetailings = AutoDetailings::all();

      foreach ($autodetailings as $ad) {
         $dateComponents = explode('-', $ad->date);
         $year = (int) $dateComponents[0];
         $month = (int) $dateComponents[1];
         $day = (int) $dateComponents[2];
         $firstName = $ad->first_name; 
         $lastName = $ad->last_name;
         $make = $ad->car_make;
         $model = $ad->car_model;
         $time = $ad->time;
 
         $full_name_with_time = $firstName . ' ' . $lastName . ' - ' . $make . ' ' . $model . ' - ' . $time;
 
         $eventsArr[] = [
             'day' => intval($day),    
             'month' => intval($month),
             'year' => intval($year),  
             'title' => $titleAD,
             'time' => $full_name_with_time,
         ];
     }


     $titlePJ = "Paint Job";
     $paintjobs = PaintJobs::all();

      foreach ($paintjobs as $pj) {
         $dateComponents = explode('-', $pj->date);
         $year = (int) $dateComponents[0];
         $month = (int) $dateComponents[1];
         $day = (int) $dateComponents[2];
         $firstName = $pj->first_name; 
         $lastName = $pj->last_name;
         $make = $pj->car_make;
         $model = $pj->car_model;
         $time = $pj->time;
 
         $full_name_with_time = $firstName . ' ' . $lastName . ' - ' . $make . ' ' . $model . ' - ' . $time;
 
         $eventsArr[] = [
             'day' => intval($day),    
             'month' => intval($month),
             'year' => intval($year),  
             'title' => $titlePJ,
             'time' => $full_name_with_time,
         ];
     }


     $titleTI = "Trade-in Request";
     $trades = Trades::all();

      foreach ($trades as $ti) {
         $dateComponents = explode('-', $ti->date);
         $year = (int) $dateComponents[0];
         $month = (int) $dateComponents[1];
         $day = (int) $dateComponents[2];
         $firstName = $ti->first_name; 
         $lastName = $ti->last_name;
         $make = $ti->unit_make;
         $model = $ti->unit_model;
         $time = $ti->time;
 
         $full_name_with_time = $firstName . ' ' . $lastName . ' - ' . $make . ' ' . $model . ' - ' . $time;
 
         $eventsArr[] = [
             'day' => intval($day),    
             'month' => intval($month),
             'year' => intval($year),  
             'title' => $titleTI,
             'time' => $full_name_with_time,
         ];
     }


      
      return view('system.calendar.index', compact('eventsArr'));
  }
  
}
