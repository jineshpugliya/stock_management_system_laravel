<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Role::all();
        return view('admin.role.list',['data'=>$data,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Role;
        $data->name=request('name');
        $data->display_name=request('display_name');

        $data->description=request('description');
        $data->save();
        return redirect('/role')->with('success','Tumhara data submited successfully');

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
        $data=Role::findOrFail(Crypt::decrypt($id));
        return view('admin/role/edit',[
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
    public function update(Request $request, $id)
    {
        $data=Role::findOrFail(Crypt::decrypt($id));
        $data->name=request('name');
        $data->display_name=request('display_name');

        $data->description=request('description');

        $data->save();

        return redirect('role/')->with('success','Tumhara data Edited successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Role::find(Crypt::decrypt($id));
        $data->delete();
        return redirect('role/')->with('success','Tumhara data Uda diyo successfully');

    }
}
