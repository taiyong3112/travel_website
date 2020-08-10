<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['customer_id','blog_id','content','parent_id'];

    public $timestamps = false;

    public function customers(){
    	return $this->hasOne(Customer::class, 'id','customer_id');
    }

    public function blogs(){
    	return $this->belongsto(Blog::class, 'blog_id');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id','id');
    }
}
    