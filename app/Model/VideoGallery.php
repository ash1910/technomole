<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    public function video_category(){
    	return $this->belongsTo(VideoCategory::class,'video_category_id','id');
    }
}
