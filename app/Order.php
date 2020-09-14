<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    //
    protected $fillable = [
        'name', 'service_id', 'user_id','status','period'
    ];

    // public function user(){
    //     return $this->hasMany('App\User','user_id','id');
    // }
    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User'); //->withTimestamps();
    }


    public function category()
    {
        return $this->belongsTo('App\Category'); //->withTimestamps();
    }
    
    public function endOrderDate()
    {
        $date = Carbon::parse($this->attributes['created_at']);
        $period = $this->attributes['period'];
        $date = $date->addDays($period)->toFormattedDateString();
        return $date;
    }
    
    public function beginOrderDate()
    {
        $date = Carbon::parse($this->attributes['created_at']);
        $date = $date->toFormattedDateString();
        return $date;
    }
    
    


}
