<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoDetailings extends Model
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
        'special_request',
        'photo_1',
        'photo_2',
        'photo_3',
        'photo_4',
        'photo_5',
        'photo_6',
    ];

    public function userAutoDetailings(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
