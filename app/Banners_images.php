<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banners_images extends Model
{
    protected $table ='banners_images';

    public function banners()
    {
        return $this->belongsTo('App\Banners','bn_id');
    }
}
