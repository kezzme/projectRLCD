<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingStatuses extends Model
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
        'first_name', 
        'last_name',
        'contact',
        'email',
        'date',
        'time',
        'financing_bank',
        'status'
    ];
}
