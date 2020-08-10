<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'customers';
    protected $fillable = [
        'l_name', 'f_name', 'email', 'password', 'birthday', 'phone', 'address', 'company_name', 'company_phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public $timestamps = false;

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class,'customer_id','id');
    }
}
