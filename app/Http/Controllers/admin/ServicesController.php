<?php

namespace App\Http\Controllers\admin;

use App\Field;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Skill;
use App\Work;
use Illuminate\Support\Facades\Validator;


class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
        $cnt=0;
        return view('ipanel.services.index',compact('services','cnt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ipanel.services.addService');
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
           'service_description'=>'required|max:1000',
           'service_name'=>'required|max:100',
           'service_image'=>'required|max:10240'
       ], [
           'service_description.required' => 'حقل :attribute حقل إجباري.',
           'service_name.required' => 'حقل :attribute حقل إجباري.',
           'service_image.max' => 'حقل cv  اقل من 10 ميجا.',
           'service_image.required' => 'حقل :attribute حقل إجباري.'
       ]);


        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $image=$request->file('service_image');
        $imageName = time().$image->getClientOriginalName();
        $img = \Image::make($image->getRealPath());
        // $img->resize(250, 250);
        $img->save(public_path().'/images/'.$imageName);
    //    dd($request);
        $service = new Service();
        $service->name = $request->service_name;
        $service->description = $request->service_description;
        $service->image = $imageName;
        $service->save();


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
        $service  = Service::find($id);
        return view('ipanel.services.showService',compact('service'));
    }
 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function edit($id)
    {
        //
        $service = Service::find($id);
        return view('ipanel.services.editService',compact('service'));

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
           'service_description'=>'required|max:1000',
           'service_name'=>'required|max:100',
           'service_image'=>'required|max:10240'
       ], [
           'service_description.required' => 'حقل :attribute حقل إجباري.',
           'service_name.required' => 'حقل :attribute حقل إجباري.',
           'service_image.max' => 'حقل cv  اقل من 10 ميجا.',
           'service_image.required' => 'حقل :attribute حقل إجباري.'
       ]);


        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $service = Service::find($id);

        if ($request->file('service_image') != NULL) {

        $image=$request->file('service_image');
        $imageName = time().$image->getClientOriginalName();
        $img = \Image::make($image->getRealPath());
        // $img->resize(250, 250);
        $img->save(public_path().'/images/'.$imageName);
        $service->image = $imageName;
        }
        $service->name = $request->service_name;
        $service->description = $request->service_description;
        $service->save();


        return redirect()
        ->back()->with(['message'=>'تمت الإضافة بنجاح','type' => 'alert-success']);


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
        Service::find($id)->delete();
        return redirect()
        ->back()->with(['message'=>' تمت الحذف بنجاح','type' => 'alert-success']);

    }
}
