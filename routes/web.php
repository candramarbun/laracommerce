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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category','CategoryController@index')->name('category_index');
Route::get('/manage-category',['uses'=>'CategoryController@manageCategory']);
Route::post('add-category',['as'=>'add.category','uses'=>'CategoryController@addCategory']);
Route::get('/product/add-product',['as'=>'add.product','uses'=>'ProductController@createProduct']);
Route::post('/product/dropdown',['as'=>'dropdown.product','uses'=>'ProductController@dropdownCat']);
