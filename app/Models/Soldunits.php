<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soldunits extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'uid',
        'car_year', 
        'car_make', 
        'car_model', 
        'car_variant',
        'bought_price', 
        'car_price',
        'car_plate_no', 
        'image',
        'first_name', 
        'last_name',
        'contact',
        'email',
        'date',
        // 'agreed_price',
        // profit
        'transaction_type'
    ];
}
