<?php
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('category','CategoryController');
Route::resource('subcategory','SubCategoryController');
Route::resource('product','ProductController');


Route::resource('role','RoleController');
Route::resource('user','UserController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sendMail', 'HomeController@sendMail');
Route::get('/unreadNoti', 'HomeController@unreadNoti');


