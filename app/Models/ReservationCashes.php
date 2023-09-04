<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationCashes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'uid',
        'date',
        'received_from',
        'postal_address',
        'amount',
        'price',
        'car_year', 
        'car_make', 
        'car_model', 
        'car_variant', 
        'exterior_color',
        'car_price',
        'car_plate_no', 
        'image',
        'agreed_price',
        'deposit',
        'balance',
        'due_date',
        'checkboxes',
        'first_name', 
        'last_name',
        'contact',
        'witness',
        'client_name',
        'client_contact',
    ];
}
