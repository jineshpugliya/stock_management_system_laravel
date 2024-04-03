<?php

namespace App\Http\Controllers;

use App\User;
use App\Notifications\Test;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function sendMail(){
        $user=User::find(2);
       // Notification::send($user,new Test());
       Notification::send($user,new Test(['url'=>'https://google.com','line_one'=>'welcome to our www.axixatechnologies.com','line_two'=>'work on progress']));
       //     dd("Notification sent");

    }
    public function unreadNoti(){
        $user=Auth::user();
       //dd($user);
       // Notification::send($user,new Test());
       foreach($user->unreadNotifications as $notification){
         // dd($notification->id);
          $temp = $user->notifications()->where('id',$notification->id)->first();
          dd($temp->markAsRead());

        }

    }
}
