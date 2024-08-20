<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhotoFolder extends Model
{
    public function photo_category(){
    	return $this->belongsTo(PhotoCategory::class,'photo_category_id','id');
    }
}
