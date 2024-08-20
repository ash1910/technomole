<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Model\User;

class comment extends Model
{
    protected $table = "comments";
    public function blog(){
    	return $this->belongsTo(Blog::class,'blog_id','id');
    }

    public function user(){
    	return $this->belongsTo(User::class,'reply_by','id');
    }

    public function sub_comment(){
    	return $this->hasMany(SubComment::class,'comment_id','id');
    }
}
