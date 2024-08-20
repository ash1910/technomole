<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AudioGallery extends Model
{
    public function audio_category(){
    	return $this->belongsTo(AudioCategory::class,'audio_category_id','id');
    }
}
