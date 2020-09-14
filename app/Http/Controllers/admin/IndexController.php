<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Field;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Skill;
use App\User;
use App\Work;
use Illuminate\Support\Facades\Validator;


class IndexController extends Controller
{
    public function homeView()
    {
        // 
        $services  = Service::get();
        $last_Works  = Work::where('last_work_flag','=','1')->get();
        $admin  = Admin::with(['user'])->first();
        $skills  = Skill::get();
        $fields  = Field::get();
        // dd($admin);

        return view('index',compact('services','last_Works','skills','fields','admin'));
   
    }
}
