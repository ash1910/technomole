<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    public function photo_category(){
    	return $this->belongsTo(PhotoCategory::class,'photo_category_id','id');
    }

    public function photo_folder(){
    	return $this->belongsTo(PhotoFolder::class,'photo_folder_id','id');
    }

    public function photo_Gallery_details(){
    	return $this->hasMany(PhotoGalleryDetail::class,'photo_gallery_id','id');
    }
}
