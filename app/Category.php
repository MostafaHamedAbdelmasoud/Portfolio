<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;

class Category extends Model
{
    //
    protected $table = 'categories';

    
    public function getServices($id){
        $paranet_services = Service::find($id);
        return $paranet_services;
    }

    public function service()
    {
        return $this->belongsTo('App\Service'); //->withTimestamps();
    }


    public function order(){
        return $this->hasMany('App\Order','category_id','id');
    }

    public function categories()
    {
    return $this->hasMany('App\Work','category_id','id');
    }
}
