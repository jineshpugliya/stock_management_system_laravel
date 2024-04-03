<?php

namespace App\Http\Controllers;

use App\Notifications\Test;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=User::all();
        return view('user.list',['data'=>$data,
       ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');

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
            'email'=>'required',
            // 'mobile'=>'required',

            // 'email_verified_at'=>'nullable',
            'password'=>'required',
            'remember_token'=>'nullable',

            // 'media'=>'required',
        ]);
        $data=new User;
        $data->name=request('name');
        $data->email=request('email');
        // $data->mobile=request('mobile');
        // $data->email_verified_at=request('email_verified_at');
        $data->password=request('password');
        $data->remember_token=request('remember_token');

        //$data->user=request('cat');

        //$data->media=request('media')->hashName();
        //request('media')->store('public/media/');
            //dd($data->media);

        $data->save();
        Notification::send($data,new Test());

        //middleware(AgeMiddleware::class);

        return redirect('/user')->with('success','Tumhara data submited successfully');

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
        $data=User::findOrFail(Crypt::decrypt($id));
        return view('user/edit',[
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
        request()->validate([
            'name'=>'required',
            'email'=>'required|max:150',
            // 'mobile'=>'required|max:15',

            // 'cat'=>'nullable',

            // 'media'=>'required',
        ]);
            $data=User::findOrFail(Crypt::decrypt($id));
            $data->name=request('name');
            $data->email=request('email');
            // $data->mobile=request('mobile');

        // $data->user=request('cat');

         //  $data->media=request('media');
        //    if(request('media')){
        //        Storage::delete('public/media/'.$data->media);
        //        $data->media=request('media')->hashName();
        //        request('media')->store('public/media');
        //    }
            $data->save();

            return redirect('user/')->with('success','Tumhara data Edited successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=User::find(Crypt::decrypt($id));
        // Storage::delete('public/media/'.$data->media);
        $data->delete();
        return redirect('user/')->with('success','Tumhara data Uda diyo successfully');

    }
}
