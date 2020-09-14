<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class AdminController extends Controller implements Authenticatable
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use AuthenticableTrait;
    public function checkAdmin(){
        // dd(Auth::User());
        if(!Auth::guest()){
            // $user = Auth::login(['email'=>$c->email,'password'=> $c->password]);
            if(Auth::User()->isAdmin){
                return redirect('/ipanel');
            }
        }
        else{
            return redirect('/index');
        }
    }

    
}
