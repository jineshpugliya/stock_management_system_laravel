<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $catdata=SubCategory::all();
        return view('subcategory.list',['data'=>$catdata,
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
        return view('subcategory.create',[
            'catdata'=>$catdata,
        ]);
        //dd($catdata);
       // return view('subcategory/create',compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=SubCategory::create([
            'name'=>request('name'),
            'description'=>request('description'),
            'category_id'=>request('category_id'),

        ]);
        return redirect('/subcategory')->with('success','Your data submited successfully');

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
        $data=SubCategory::findOrFail(Crypt::decrypt($id));
        $catdata=DB::table('categories')->select('id','name')->get();

//dd($catdata);

        return view('subcategory.edit',[
            'data'=>$data,
            'catdata'=>$catdata,
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
        // request()->validate([
        //     'name'=>['required'],
        //     'description'=>['required|max:150'],
        //     'category_id'=>['required'],
        //     // 'cat'=>'nullable',

        //     // 'media'=>'required',
        // ]);
            $data=SubCategory::findOrFail(Crypt::decrypt($id));
            $data->name=request('name');

            $data->description=request('description');
          //  $data->category->name=request('')


           $data->category_id=request('category_id');

        // $catdata->subcategory=request('cat');

         //  $catdata->media=request('media');
        //    if(request('media')){
        //        Storage::delete('public/media/'.$catdata->media);
        //        $catdata->media=request('media')->hashName();
        //        request('media')->store('public/media');
        //    }
            $data->save();
        if($data->wasChanged())
            return  redirect('/subcategory')->with('success','Your data Edited successfully');
        return redirect('/subcategory')->with('success','Your data Edited successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catdata=SubCategory::find(Crypt::decrypt($id));
        // Storage::delete('public/media/'.$catdata->media);
        $catdata->delete();
        return redirect('subcategory/')->with('success','Your data Uda diyo successfully');

    }
}
