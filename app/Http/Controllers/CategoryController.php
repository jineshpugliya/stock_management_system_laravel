<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Category::all();
        return view('category.list',['data'=>$data,
       ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=>'required',
            'des'=>'required|max:150',
            // 'cat'=>'nullable',

            // 'media'=>'required',
        ]);
        $data=new Category;
        $data->name=request('name');
        $data->des=request('des');
        //$data->category=request('cat');

        //$data->media=request('media')->hashName();
        //request('media')->store('public/media/');
            //dd($data->media);

        $data->save();
        //middleware(AgeMiddleware::class);

        return redirect('/category')->with('success','Tumhara data submited successfully');
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
        $data=Category::findOrFail(Crypt::decrypt($id));
        return view('category/edit',[
            'data'=>$data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        request()->validate([
            'name'=>'required',
            'des'=>'required|max:150',
            // 'cat'=>'nullable',

            // 'media'=>'required',
        ]);
            $data=Category::findOrFail(Crypt::decrypt($id));
            $data->name=request('name');
            $data->des=request('des');
        // $data->category=request('cat');

         //  $data->media=request('media');
        //    if(request('media')){
        //        Storage::delete('public/media/'.$data->media);
        //        $data->media=request('media')->hashName();
        //        request('media')->store('public/media');
        //    }
            $data->save();

            return redirect('category/')->with('success','Tumhara data Edited successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Category::find(Crypt::decrypt($id));
    // Storage::delete('public/media/'.$data->media);
    $data->delete();
    return redirect('category/')->with('success','Tumhara data Uda diyo successfully');
    }
}
