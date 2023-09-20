<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradedUnits extends Model
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
        'added_by',
        'car_year', 
        'car_make', 
        'car_model', 
        'car_variant',
        'bought_price', 
        'car_price',
        'car_plate_no', 
        'image',
        'agreed_price',
        'deposit',
        'balance',
        'due_date',
        'unit_year', 
        'unit_make', 
        'unit_model', 
        'unit_variant', 
        'unit_price',
        'unit_plate_no', 
        'first_name', 
        'last_name',
        'contact'
    ];
}
