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

Route::get('/', function () {
    return view('firstpage');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('projects')->group(function (){
    Route::get('/', 'ProjectsController@index');
    Route::get('/create', 'ProjectsController@create');
    Route::post('/create', 'ProjectsController@store');
    Route::get('/{project}', 'ProjectsController@show');
    Route::get('/download/project/{project}','ProjectsController@download');
});

Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/approve/project/{project}', 'AdminController@show');
    Route::post('/approve/project/{project}', 'ChapterController@store');

});
