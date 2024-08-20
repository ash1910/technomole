<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    Protected $fillable = ['date','title_en','title_bn','description_en','description_bn','image'];
}
