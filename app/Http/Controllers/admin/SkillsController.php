<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Skill;

use Illuminate\Support\Facades\Validator;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $skills =  Skill::all();
        $cnt=0;
        return view('ipanel.skills.index',compact('skills','cnt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ipanel.skills.add');
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
        $validator= Validator::make($request->all(),
        [
           'skill_name'=>'required|max:100',
           'skill_value'=>'required|digits_between:1,3'
       ], [
           'skill_name.required' => 'حقل :attribute حقل إجباري.',
           'skill_value.digits_between' => 'حقل القيمه  اقل من أو يساوي 100 .',
           'skill_value.required' => 'حقل :attribute حقل إجباري.'
       ]);


        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $skill = new Skill();
        $skill->name = $request->skill_name;
        $skill->value = $request->skill_value;
        $skill->save();


        return redirect()
        ->back()->with(['message'=>'تمت الإضافة بنجاح','type' => 'alert-success']);

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
        $skill = Skill::find($id);
        return view('ipanel.skills.edit',compact('skill'));
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
        $validator= Validator::make($request->all(),
        [
           'skill_name'=>'required|max:100',
           'skill_value'=>'required|digits_between:1,3'
       ], [
           'skill_name.required' => 'حقل :attribute حقل إجباري.',
           'skill_value.digits_between' => 'حقل القيمه  اقل من أو يساوي 100 .',
           'skill_value.required' => 'حقل :attribute حقل إجباري.'
       ]);

        // dd($request);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $skill =  Skill::find($id);
        $skill->name = $request->skill_name;
        $skill->value = $request->skill_value;
        $skill->save();


        return redirect()
        ->back()->with(['message'=>'تمت التعديل بنجاح','type' => 'alert-success']);

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
