<?php

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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('firstpage');
});

Auth::routes(['verify' => true]);

Route::get('/clear-stupid-cache', function(){
    Artisan::call('config:cache');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/user', function (Request $request){
//    return ['the', 'request', 'was', 'seen'];
    return [$request->fileSelect];
});

Route::post('/users', 'ProjectsController@store');

Route::prefix('projects')->group(function (){
    Route::get('/', 'ProjectsController@index');
    Route::get('/popular', 'ProjectsController@indexPopular');
    Route::get('/latest', 'ProjectsController@indexLatest');
    Route::get('/create', 'ProjectsController@create');
    Route::post('/create', 'ProjectsController@store');
    Route::get('/payment/project/{project}', 'ProjectsController@payment');
    Route::post('/payment/project/{project}', 'PaidProductController@storeProject');
    Route::get('/payment/chapter/{chapter}', 'ChapterController@payment');
    Route::post('/payment/chapter/{chapter}', 'PaidProductController@storeChapter');
    Route::get('/download/project/{project}','ProjectsController@download');
    Route::get('/unapproved', 'HomeController@showUnapprovedProject');
    Route::get('/approved', 'HomeController@showApprovedProject');
    Route::get('/{project}', 'ProjectsController@show');
});

Route::get('/tags', 'TagController@index');
Route::get('/tags/{tag}', 'TagController@show');

Route::get('/user/accounts', 'HomeController@showAccount')->name('userAccount');
Route::post('/user/accounts', 'HomeController@storeAccount')->name('userAccount');
Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/approve/project/{project}', 'AdminController@show');
    Route::post('/approve/project/{project}', 'ChapterController@store');
    Route::get('/approve/project/{project}/without-chapter', 'ProjectsController@edit');
    Route::post('/approve/project/{project}/without-chapter', 'ProjectsController@update');
    Route::get('/project/softdelete/{project}', 'ProjectsController@softDelete');
    Route::get('/project/delete/{project}', 'ProjectsController@destroy');
    Route::get('/tags/create', 'TagController@create')->name('createTags');
    Route::post('/tags/create', 'TagController@store')->name('createTags');
});
