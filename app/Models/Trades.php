<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trades extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'uid',
        'car_year', 
        'car_make', 
        'car_model', 
        'car_variant',
        'car_plate_no',
        'bought_price',
        'car_price',
        'image', 
        'first_name', 
        'last_name',
        'contact',
        'email',
        'unit_year', 
        'unit_make', 
        'unit_model', 
        'unit_variant', 
        'unit_plate_no',
        'unit_trade_value',
        'date',
        'time',
        'photo_1',
        'photo_2',
        'photo_3',
        'photo_4',
        'photo_5',
        'photo_6',
    ];

    protected $casts = [
        'photo_1' => 'array',
        'photo_2' => 'array',
        'photo_3' => 'array',
        'photo_4' => 'array',
        'photo_5' => 'array',
        'photo_6' => 'array',
    ];

    public function userTrades(){
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
