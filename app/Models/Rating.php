<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function user()
    {
    	return $this->belongTo(User::class,'user_id','id');
    }
    public function tour()
    {
    	return $this->belongTo(Tour::class,'tour_id','id');
    }

    
}
