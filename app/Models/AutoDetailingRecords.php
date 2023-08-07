<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoDetailingRecords extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'contact',
        'email',
        'car_year',
        'car_make',
        'car_model',
        'car_variant',
        'unit_plate_no',
        'date',
        'time',
        'amount',
       
    ];
}
