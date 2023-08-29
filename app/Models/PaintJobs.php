<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaintJobs extends Model
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

    // protected $casts = [
    //     'photo_1' => 'array',
    //     'photo_2' => 'array',
    //     'photo_3' => 'array',
    //     'photo_4' => 'array',
    //     'photo_5' => 'array',
    //     'photo_6' => 'array',
    // ];

    public function paintjobs(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
