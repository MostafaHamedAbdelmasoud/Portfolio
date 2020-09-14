<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admin = Admin::with(['user'])->first();
        return view('ipanel.main.main', compact('admin'));
    }


    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function StoreMain(Request  $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'welcome' => 'required',
                'job' => 'required|max:200',
                'name' => 'required|max:200',
                'cv'=>'max:10240',
                'user_main_image'=>'max:10240',
                'user_second_image'=>'max:10240',
                'description' => 'required'
            ],
            [
                'welcome.required' => 'حقل :attribute حقل إجباري.',
                'job.required' => 'حقل :attribute حقل إجباري.',
                'name.required' => 'حقل :attribute حقل إجباري.',
                'cv.max' => 'حقل cv  اقل من 10 ميجا.',
                'user_main_image.max' => 'حقل :attribute  اقل من 10 ميجا.',
                'user_second_image.max' => 'حقل :attribute  اقل من 10 ميجا.',
                // 'cv.required' => 'حقل :attribute حقل إجباري.',
                'description.required' => 'حقل :attribute حقل إجباري.'
            ]
        );


        if ($validator->fails()) {
            return redirect('ipanel/edit-main')
                ->withErrors($validator)
                ->withInput();
        }

        // if i want use this code, i must out the image required| upward.
        $admin = Admin::with(['user'])->first();
        if ($request->file('cv') != NULL) {
            $image = $request->file('cv');
            $imageName = time() . $image->getClientOriginalName();
            
            $request->file('cv')->move('cv/', $imageName);
           
            $admin->cv = $imageName;
        }


        if ($request->file('user_main_image') != NULL) {
            $image = $request->file('user_main_image');
            $imageName = time() . $image->getClientOriginalName();
            $img = \Image::make($image->getRealPath());
            // $img->resize(250, 250);
            $img->save(public_path() . '/images/' . $imageName);
            $admin->image = $imageName;
            //    dd($request);
        }

        if ($request->file('user_second_image') != NULL) {
            $image = $request->file('user_second_image');
            $imageName = time() . $image->getClientOriginalName();
            $img = \Image::make($image->getRealPath());
            // $img->resize(250, 250);
            $img->save(public_path() . '/images/' . $imageName);
            $admin->second_image = $imageName;
        }

        if ($request->file('user_skill_image') != NULL) {
            $image = $request->file('user_skill_image');
            $imageName = time() . $image->getClientOriginalName();
            $img = \Image::make($image->getRealPath());
            // $img->resize(250, 250);
            $img->save(public_path() . '/images/' . $imageName);
            $admin->skill_image = $imageName;
        }


        
        // dd($admin->user->name);
        $admin->welcome = $request->welcome;
        $admin->job = $request->job;
        $admin->user->name = $request->name;
        $admin->description = $request->description;
        $admin->save();
        $admin->user->save();

        return redirect()
            ->back()->with(['message' => 'تمت الإضافة بنجاح', 'type' => 'alert-success']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
