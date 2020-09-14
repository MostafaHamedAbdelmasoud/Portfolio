<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    public function category()
    {
        return $this->belongsTo('App\Category'); //->withTimestamps();
    }
}
