<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationTradeIns extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'uid',
        'date',
        'agreed_amount',
        'added_by',
        'received_from',
        'postal_address',
        'amount',
        'price',
        'car_year', 
        'car_make', 
        'car_model', 
        'car_variant',
        'bought_price', 
        'car_price',
        'car_plate_no', 
        'image',
        'car_trade_value',
        'deposit',
        'balance',
        'due_date',
        'checkboxes',
        'unit_year', 
        'unit_make', 
        'unit_model', 
        'unit_variant', 
        'unit_trade_value',
        'unit_plate_no', 
        'checkboxes2',
        'first_name', 
        'last_name',
        'contact',
        'witness',
        'client_name',
        'client_contact',
    ];
}
