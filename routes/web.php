<?php

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

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/home', 'App\Http\Controllers\HomeController@handleAdmin')->name('admin.route');
    Route::resource('admin/users', 'App\Http\Controllers\UserController',['names'=>[

        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'update'=>'admin.users.update',
        'edit'=>'admin.users.edit',
        'show'=>'admin.users.show',
        'destroy'=>'admin.users.destroy',

    ]]);
    Route::get('admin/profile', ['as' => 'admin.profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@adminedit']);
    Route::put('admin/profile', ['as' => 'admin.profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('admin/profile/password', ['as' => 'admin.profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
