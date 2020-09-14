<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countCat = new Controller();
        $countCat = $countCat->cnt;
        $categories = Category::with(['service'])->get();
        // dd($categories);
        $cnt = 0;
        // return View::make('ipanel.categories.index', $categories)->nest('services', $categories);
        return view('ipanel.categories.index', compact('categories', 'cnt', 'countCat'));
    }

    public function index2($id)
    {
        //
        $service = Service::find($id);
        $categories = Category::where('service_id','=',$service->id)->get();

        // dd($categories);
        $cnt = 0;
        return view('services', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $paranet_services = Service::all();
        return view('ipanel.categories.add', compact('paranet_services'));
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
        $validator = Validator::make(
            $request->all(),
            [
                'category_description' => 'required|max:1000',
                'category_name' => 'required|max:100',
                'category_image' => 'required|max:10240'
            ],
            [
                'category_description.required' => 'حقل :attribute حقل إجباري.',
                'category_name.required' => 'حقل :attribute حقل إجباري.',
                'category_image.max' => 'حقل cv  اقل من 10 ميجا.',
                'category_image.required' => 'حقل :attribute حقل إجباري.'
            ]
        );


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('category_image');
        $imageName = time() . $image->getClientOriginalName();
        $img = \Image::make($image->getRealPath());
        // $img->resize(250, 250);
        $img->save(public_path() . '/images/' . $imageName);
        //    dd($request);
        $category = new Category();
        $category->name = $request->category_name;
        $category->service_id = $request->category_paranet_service;
        $category->cat_description = $request->category_description;
        $category->price = $request->category_price;
        $category->image = $imageName;
        $category->save();


        return redirect()
            ->back()->with(['message' => 'تمت الإضافة بنجاح', 'type' => 'alert-success']);
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
        $category  = Category::find($id);

        return view('ipanel.categories.show', compact('category'));
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
        $category = Category::find($id);
        $paranet_services = Service::all();
        return view('ipanel.categories.edit', compact('category', 'paranet_services'));
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
        $validator = Validator::make(
            $request->all(),
            [
                'category_description' => 'required|max:1000',
                'category_name' => 'required|max:100',
                'category_image' => 'required|max:10240'
            ],
            [
                'category_description.required' => 'حقل :attribute حقل إجباري.',
                'category_name.required' => 'حقل :attribute حقل إجباري.',
                'category_image.max' => 'حقل cv  اقل من 10 ميجا.',
                'category_image.required' => 'حقل :attribute حقل إجباري.'
            ]
        );


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $category = Category::find($id);
        if ($request->file('category_image') != NULL) {
 
        $image = $request->file('category_image');
        $imageName = time() . $image->getClientOriginalName();
        $img = \Image::make($image->getRealPath());
        // $img->resize(250, 250);
        $img->save(public_path() . '/images/' . $imageName);
        //    dd($request);
        $category->image = $imageName;
        }
        $category->name = $request->category_name;
        $category->service_id = $request->category_paranet_service;
        $category->cat_description = $request->category_description;
        $category->price = $request->category_price;
        $category->save();


        return redirect()
            ->back()->with(['message' => 'تمت الإضافة بنجاح', 'type' => 'alert-success']);
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
        Category::find($id)->delete();
        return redirect()
            ->back()->with(['message' => ' تمت الحذف بنجاح', 'type' => 'alert-success']);
    }
}
