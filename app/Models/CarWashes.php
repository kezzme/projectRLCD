<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarWashes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'contact',
        'email',
        'car_make',
        'car_model',
        'unit_plate_no',
        'body_type',
        'amount',
        'date',
        'time',
        'special_request',
    ];

    protected $casts = [
        'amount' => 'decimal:2', // 2 decimal places
    ];

    public function userCarWashes(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
