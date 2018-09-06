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
    return view('ast');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('ast');
Route::get('/add','manage@Add_article') ;
Route::post('/add','manage@Add_article') ;
Route::get('/view','manage@view') ;
//Route::get('/read/{id}','manage@pro')->name('pro');
Route::get('/read/{id}','manage@read') ;
Route::post('/read/{id}', 'manage@read') ;
Route::get('/About',function (){
    return view('About') ;
}) ;
Route::get('profile', 'manage@profile');
Route::post('profile', 'manage@update_avatar');
Route::get('/prof/{id}','manage@prof') ;






