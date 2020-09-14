<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    //
    public function download($file_name){
    $file_path = public_path('cv/'.$file_name);
    // dd($file_path);
    if (!file_exists($file_path)) {  
        return view('NotFound');
    }
    return response()->download($file_path);
    }
}
