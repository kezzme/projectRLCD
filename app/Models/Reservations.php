<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'uid',
        'car_year', 
        'car_make', 
        'car_model', 
        'car_variant', 
        'car_price',
        'car_plate_no', 
        'image',
        'first_name', 
        'last_name',
        'contact',
        'email',
        'date',
        'time',
        'status'
    ];
}
