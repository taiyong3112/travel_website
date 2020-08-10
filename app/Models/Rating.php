<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
	protected $fillable = ['rating','customer_id','tour_id','comment'];
	public $timestamps = false;
    public function customers()
    {
    	return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function tours()
    {
    	return $this->belongsTo(Tour::class,'tour_id','id');
    }

    
}
