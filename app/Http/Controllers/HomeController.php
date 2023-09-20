<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingMail;

class HomeController extends Controller
{
    public function index() {
        return view('home.index');
    }

    public function finanCal() {
        return view('landing.financing-calculator');
    }

    public function gallery() {
        return view('landing.gallery');
    }

    public function contact() {
        return view('landing.contact');
    }
    public function termsAndconditions(){
        return view('home.termsAndconditions');
    }
    
}
