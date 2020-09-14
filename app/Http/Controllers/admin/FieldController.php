<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Field;
use Illuminate\Support\Facades\Validator;
 

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $fields = Field::all();
          $cnt=0;
          return view('ipanel.about.index', compact('fields','cnt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ipanel.about.addAboutField');
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
                    'name'=>'required',
                    'value'=>'required|max:100'
                ], [
                   'name.required' => 'حقل :attribute حقل إجباري.',
                    'cv.value' => 'حقل cv  اقل من 100 .',
                    'cv.required' => 'حقل :attribute حقل إجباري.'
                ]);
        
        
        if ($validator->fails()) {
             return redirect('ipanel/about/addAboutField')
                        ->withErrors($validator)
                        ->withInput();
        }

        $filed = new Field();
        $filed->name = $request->name;
        $filed->value =$request->value;
        $filed->save();

        $fields = Field::all();
          $cnt=0;
          return view('ipanel.about.index', compact('fields','cnt'));
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
        $field = Field::find($id);
        return view('ipanel.about.editAbout',compact('field'));

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
                    'name'=>'required',
                    'value'=>'required|max:100'
                ], [
                   'name.required' => 'حقل :attribute حقل إجباري.',
                    'cv.value' => 'حقل cv  اقل من 100 .',
                    'cv.required' => 'حقل :attribute حقل إجباري.'
                ]);
        
        
        if ($validator->fails()) {
             return redirect('ipanel/about/addAboutField')
                        ->withErrors($validator)
                        ->withInput();
        }

        $filed = Field::find($id);
        $filed->name = $request->name;
        $filed->value =$request->value;
        $filed->save();

        $fields = Field::all();
          $cnt=0;
          return view('ipanel.about.index', compact('fields','cnt'));
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
        Field::find($id)->delete();
        return redirect()
        ->back()->with(['message'=>' تمت الحذف بنجاح','type' => 'alert-success']);

    }
}
