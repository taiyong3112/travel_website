<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function tours(){
    	return $this->belongTo(Tour::class,'tour_id');
    }
    public function customers(){
    	return $this->belongTo(Customer::class,'customer_id');
    }
    public $timestamps = false;
    protected $table = 'bookings';
    protected $fillable = ['customer_id', 'tour_id', 'start_date', 'adult_number', 'children_number', 'total_price','note','hotel_status'];
}
