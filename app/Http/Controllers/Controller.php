<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Category;
use App\Service;
use View;

class Controller extends BaseController
{
    public  $cnt,$cntServices;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // public function __construct(){
    //     $this->cnt = (Category::all())->count();
    //     $this->cntServices = (Service::all())->count();
    //     View::share ( 'cat_count', $this->cnt );
    //     View::share ( 'cat_services', $this->cntServices );
    // }
}
