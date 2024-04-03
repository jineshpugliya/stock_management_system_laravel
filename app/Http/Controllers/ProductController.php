<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catdata=Product::all();
        return view('product.list',['data'=>$catdata,
       ]);

       $subcatdata=Product::all();
       return view('product.list',['subcatdata'=>$subcatdata,
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catdata=DB::table('categories')->select('id','name')->get();


        $subcatdata=DB::table('sub_categories')->select('id','name')->get();
        return view('product.create',[
            'catdata'=>$catdata,
           'subcatdata'=>$subcatdata,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=Product::create([

            'category_id'=>request('category_id'),
            'subcategory_id'=>request('subcategory_id'),

            'name'=>request('name'),
            'description'=>request('description'),
        ]);
        return redirect('/product')->with('success','Tumhara data submited successfully');

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
        $data=Product::findOrFail(Crypt::decrypt($id));
        $catdata=DB::table('categories')->select('id','name')->get();
        $subcatdata=DB::table('sub_categories')->select('id','name')->get();

//dd($catdata);

        return view('product.edit',[
            'data'=>$data,
            'catdata'=>$catdata,
            'subcatdata'=>$subcatdata,
        ]);
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
        $data=Product::findOrFail(Crypt::decrypt($id));
        $data->name=request('name');

        $data->description=request('description');
      //  $data->category->name=request('')


       $data->category_id=request('category_id');
       $data->subcategory_id=request('subcategory_id');

    // $catdata->product=request('cat');

     //  $catdata->media=request('media');
    //    if(request('media')){
    //        Storage::delete('public/media/'.$catdata->media);
    //        $catdata->media=request('media')->hashName();
    //        request('media')->store('public/media');
    //    }
        $data->save();
    if($data->wasChanged())
        return  redirect('/product')->with('success','Tumhara data Edited successfully');
    return redirect('/product')->with('success','Tumhara data Edited successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catdata=Product::find(Crypt::decrypt($id));
        // Storage::delete('public/media/'.$catdata->media);
        $catdata->delete();
        return redirect('product/')->with('success','Tumhara data Uda diyo successfully');

    }
}
