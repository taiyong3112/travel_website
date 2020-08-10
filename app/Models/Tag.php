<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'status'];

    public $timestamps = false;

    public function blogs(){
    	return $this->belongToMany(Blog::class,'tag_details','tag_id','blog_id');
    }
}
