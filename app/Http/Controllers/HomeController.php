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

    public function about() {
        return view('landing.about');
    }

    public function contact() {
        return view('landing.contact');
    }
    public function sample(){
        $details = 'jonny';
        Mail::to('fake@gmail.com')->send(new BookingMail($details, 'landing.mail'));
        return view('landing.sample');
    }
}
