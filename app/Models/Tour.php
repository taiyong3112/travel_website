<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
    	'name',
        'slug',
    	'destination_id',
    	'summary',
    	'content',
    	'image',
    	'adult_price',
    	'children_price',
    	'duration',
        'status',
        'location',
        'meta_keywords',
        'meta_descriptions'
    ];
    public $timestamps = false;
    
    public function destinations()
    {
        return $this->belongsTo(Destination::class,'destination_id');
    }
    
    public function packages()
    {
        return $this->belongsToMany(Package::class,'package_details', 'tour_id', 'package_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class,'tour_id','id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    
}
