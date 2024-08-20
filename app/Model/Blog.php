<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function blog_file()
    {
    	return $this->hasMany(BlogFile::class,'blog_id','id');
    }
}
