<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
    	'name',
    	'image',
    	'status'
    ];
    public $timestamps = false;
}
