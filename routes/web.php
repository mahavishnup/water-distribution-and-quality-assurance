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

Auth::routes(['verify' => true]);

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/quality/{slug}', 'App\Http\Controllers\Admin\QualityController@show')->name('/quality/{slug}');

Route::get('/feedback/{id}', 'App\Http\Controllers\CustomerFeedbackController@show')->name('/feedback/{id}');

Route::get('/request/{id}', 'App\Http\Controllers\CustomerFeedbackController@show')->name('/request/{id}');

Route::get('/location/{id}', 'App\Http\Controllers\Admin\LocationController@show')->name('/location/{id}');

Route::get('/tracking/{id}', 'App\Http\Controllers\Admin\TrackingController@show')->name('/tracking/{id}');

Route::get('/service/{id}', 'App\Http\Controllers\Admin\ServiceController@show')->name('/service/{id}');

Route::get('/package/{id}', 'App\Http\Controllers\Admin\PackageController@show')->name('/package/{id}');

Route::get('/tanker/{id}', 'App\Http\Controllers\TankerController@show')->name('/tanker/{id}');

Route::get('/harvest/{id}', 'App\Http\Controllers\HarvestController@show')->name('/harvest/{id}');

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    Route::resource('/tanker', 'App\Http\Controllers\TankerController',['names'=>[

        'index'=>'tanker.index',
        'create'=>'tanker.create',
        'store'=>'tanker.store',
        'update'=>'tanker.update',
        'edit'=>'tanker.edit',
        'destroy'=>'tanker.destroy',

    ]]);

    Route::resource('/harvest', 'App\Http\Controllers\HarvestController',['names'=>[

        'index'=>'harvest.index',
        'create'=>'harvest.create',
        'store'=>'harvest.store',
        'update'=>'harvest.update',
        'edit'=>'harvest.edit',
        'destroy'=>'harvest.destroy',

    ]]);

    Route::resource('/harvest', 'App\Http\Controllers\TrackController',['names'=>[

        'destroy'=>'track.destroy',

    ]]);

    Route::get('/track/{id}', 'App\Http\Controllers\TrackController@show')->name('/track/{id}');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/home', 'App\Http\Controllers\HomeController@handleAdmin')->name('admin.route');
    Route::get('admin/profile', ['as' => 'admin.profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@adminedit']);
    Route::put('admin/profile', ['as' => 'admin.profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('admin/profile/password', ['as' => 'admin.profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    Route::resource('admin/users', 'App\Http\Controllers\UserController',['names'=>[

        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'update'=>'admin.users.update',
        'edit'=>'admin.users.edit',
        'destroy'=>'admin.users.destroy',

    ]]);

    Route::resource('admin/quality', 'App\Http\Controllers\Admin\QualityController',['names'=>[

        'index'=>'admin.quality.index',
        'create'=>'admin.quality.create',
        'store'=>'admin.quality.store',
        'update'=>'admin.quality.update',
        'edit'=>'admin.quality.edit',
        'destroy'=>'admin.quality.destroy',

    ]]);

    Route::resource('admin/request', 'App\Http\Controllers\CustomerRequestController',['names'=>[

        'index'=>'admin.request.index',
        'create'=>'admin.request.create',
        'store'=>'admin.request.store',
        'update'=>'admin.request.update',
        'edit'=>'admin.request.edit',
        'destroy'=>'admin.request.destroy',

    ]]);

    Route::resource('admin/feedback', 'App\Http\Controllers\CustomerFeedbackController',['names'=>[

        'index'=>'admin.feedback.index',
        'create'=>'admin.feedback.create',
        'store'=>'admin.feedback.store',
        'update'=>'admin.feedback.update',
        'edit'=>'admin.feedback.edit',
        'destroy'=>'admin.feedback.destroy',

    ]]);

    Route::resource('admin/location', 'App\Http\Controllers\Admin\LocationController',['names'=>[

        'index'=>'admin.location.index',
        'create'=>'admin.location.create',
        'store'=>'admin.location.store',
        'update'=>'admin.location.update',
        'edit'=>'admin.location.edit',
        'destroy'=>'admin.location.destroy',

    ]]);

    Route::resource('admin/tracking', 'App\Http\Controllers\Admin\TrackingController',['names'=>[

        'index'=>'admin.tracking.index',
        'create'=>'admin.tracking.create',
        'store'=>'admin.tracking.store',
        'update'=>'admin.tracking.update',
        'edit'=>'admin.tracking.edit',
        'destroy'=>'admin.tracking.destroy',

    ]]);

    Route::resource('admin/service', 'App\Http\Controllers\Admin\ServiceController',['names'=>[

        'index'=>'admin.service.index',
        'create'=>'admin.service.create',
        'store'=>'admin.service.store',
        'update'=>'admin.service.update',
        'edit'=>'admin.service.edit',
        'destroy'=>'admin.service.destroy',

    ]]);

    Route::resource('admin/package', 'App\Http\Controllers\Admin\PackageController',['names'=>[

        'index'=>'admin.package.index',
        'create'=>'admin.package.create',
        'store'=>'admin.package.store',
        'update'=>'admin.package.update',
        'edit'=>'admin.package.edit',
        'destroy'=>'admin.package.destroy',

    ]]);

});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
