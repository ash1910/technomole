<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MenuPost extends Model
{
    protected $tbale = 'menu_posts';

    public function post_file()
    {
    	return $this->hasMany(MenuPostFile::class,'menu_post_id','id');
    }
}
