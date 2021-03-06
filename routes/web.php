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

//Ajax
/*
Route::get('/getRequest', function(){
    if(Request::ajax()){
      return 'getRequest has loaded';
    }
});*/

Route::resource('/shopping-list', 'ShoppingController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::post('/shopping-list/post', 'ShoppingController@store');
Route::post('/shoppinglist/delete/{id}', 'ShoppingController@destroy');
