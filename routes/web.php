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
    return view('welcome');
});

Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|administrator|author|editor|contributor')->group(function () {
    Route::get('/', 'ManagesController@redirect');
    Route::resource('users', 'UsersController');
    Route::get('dashboard', 'ManagesController@index')->name('manage.dashboard');
    Route::resource('permissions', 'PermissionsController', ['except' => 'destroy']);
    Route::resource('roles', 'RolesController', ['except' => 'destroy']);
    Route::resource('posts', 'PostsController');
});

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
