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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
//Route::get('/', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/admin', 'AdminController@index');

Route::get('/', 'PostController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');


/* ======================== JWT TOKEN EXAMPLE ========================= */
Route::post('auth/register', 'UserController@register');
Route::post('auth/login', 'UserController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'UserController@getAuthUser');
});