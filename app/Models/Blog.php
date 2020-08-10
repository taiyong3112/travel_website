<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
    	'name',
    	'slug',
    	'image',
    	'status',
    	'content',
    	'destination_id',
    ];
    public $timestamps = false;

    public function tags(){
    	return $this->belongsToMany(Tag::class,'tag_details','blog_id','tag_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'blog_id','id')->whereNull('parent_id');
    }


}
