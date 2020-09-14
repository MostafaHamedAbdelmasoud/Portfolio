<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    public function categories()
    {
        return $this->hasMany('App\Category','service_id','id');
    }

    // public function order(){
    //     return $this->hasMany('App\Service','service_id','id');
    // }

    

}
