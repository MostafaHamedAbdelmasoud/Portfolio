<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Work;
use App\Service;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $works = Work::with(['category'])->get();
        // $categories = Category::with(['service'])->get();
        $cnt =0;
        return view('ipanel.works.index',compact('works','cnt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('ipanel.works.add',compact('categories'));
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
           'work_description'=>'required|max:1000',
           'work_name'=>'required|max:100',
           'work_image'=>'required|max:10240'
        ],[
           'work_description.required' => 'حقل :attribute حقل إجباري.',
           'work_name.required' => 'حقل :attribute حقل إجباري.',
           'work_image.max' => 'حقل cv  اقل من 10 ميجا.',
           'work_image.required' => 'حقل :attribute حقل إجباري.'
       ]);


        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $image=$request->file('work_image');
        $imageName = time().$image->getClientOriginalName();
        $img = \Image::make($image->getRealPath());
        // $img->resize(250, 250);
        $img->save(public_path().'/images/'.$imageName);
    //    dd($request);
        $work = new work();
        $work->title = $request->work_name;
        $work->category_id = $request->work_paranet_category;
        $work->work_description = $request->work_description;
        $work->image = $imageName;
        $work->save();


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
        $work  = Work::find($id);
        return view('ipanel.works.show',compact('work'));

    }

    public function showPrevWorks($id)
    {
        //
        $category = Category::find($id);
        // dd($category);
        $serivce_id = $category->service_id;
        $works  = Work::where('category_id','=',$category->id)->get();
        $service  = Service::where('id','=',$serivce_id)->get()->first();
        // dd($serivce_id);
        return view('prevwork',compact('works','service'));

    }



    public function showPrevWorksDetail($id)
    {
        //
        $work = Work::find($id);
        // dd($serivce_id);
        return view('work',compact('work'));

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
        $work = Work::find($id);
        $categories = Category::all();
        return view('ipanel.works.edit',compact('work','categories'));
    }
    /**
     * Show the form for adding last works.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addToLastWorks($id)
    {
        //
        $work = Work::find($id);
        $work->last_work_flag = 1;
        $work->save();
        return redirect()
        ->back()->with(['message'=>' تمت الإضافة بنجاح إلى أخر الأعمال','type' => 'alert-success']);

    }
 /**
     * Show the form for adding last works.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function RemoveFromLastWorks($id)
    {
        //
        $work = Work::find($id);
        $work->last_work_flag = 0;
        $work->save();
        return redirect()
        ->back()->with(['message'=>' تمت الإضافة بنجاح إلى أخر الأعمال','type' => 'alert-success']);

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
           'work_description'=>'required|max:1000',
           'work_name'=>'required|max:100',
           'work_image'=>'required|max:10240'
        ],[
           'work_description.required' => 'حقل :attribute حقل إجباري.',
           'work_name.required' => 'حقل :attribute حقل إجباري.',
           'work_image.max' => 'حقل cv  اقل من 10 ميجا.',
           'work_image.required' => 'حقل :attribute حقل إجباري.'
       ]);


        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $work =  work::find($id);
        if ($request->file('work_image') != NULL) {

        $image=$request->file('work_image');
        $imageName = time().$image->getClientOriginalName();
        $img = \Image::make($image->getRealPath());
        $img->resize(375, 210);
        // ImageOptimizer::optimize($img);
        $img->save(public_path().'/images/'.$imageName);
    //    dd($request);
    $work->image = $imageName;
        }
        $work->title = $request->work_name;
        $work->category_id = $request->work_paranet_category;
        $work->work_description = $request->work_description;
        $work->save();


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
        Work::find($id)->delete();
        return redirect()
        ->back()->with(['message'=>' تمت الحذف بنجاح','type' => 'alert-success']);

    }
}
