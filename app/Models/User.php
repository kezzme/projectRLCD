<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'provider_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userAppointments(){
        return $this->hasOne(Appointments::class, 'user_id');
    }

    public function userTrades(){
        return $this->hasOne(Trades::class, 'user_id');
    }

    public function userAutoDetailings(){
        return $this->hasOne(AutoDetailings::class, 'user_id');
    }

    public function userCarWashes(){
        return $this->hasOne(CarWashes::class, 'user_id');
    }

    public function userPaintJobs(){
        return $this->hasOne(PaintJobs::class, 'user_id');
    }

}