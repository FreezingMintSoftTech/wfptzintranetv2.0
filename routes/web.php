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
Route::get('/', 'UserController@index');

Route::post('/signin', 'UserController@store');

Route::get('/signout', 'UserController@logout');

Route::get('/home', 'HomeController@index')->middleware('guest');

Route::get('/create_post', 'PIController@create_post')->middleware('guest');

Route::post('/store_post', 'PIController@store_post')->middleware('guest');

Route::get('/edit_post/{id}', 'PIController@edit_post')->middleware('guest');

Route::post('/edit_post/{id}', 'PIController@update_post')->middleware('guest');

Route::get('/remove_post/{id}', 'PIController@delete_post')->middleware('guest');

Route::get('/read_post/{id}', 'PIController@show_post')->middleware('guest');

Route::get('/create_news_post', 'PIController@create_news_post')->middleware('guest');

Route::post('/store_news_post', 'PIController@store_news_post')->middleware('guest');

Route::get('/edit_news_post/{id}', 'PIController@edit_news_post')->middleware('guest');

Route::post('/edit_news_post/{id}', 'PIController@update_news_post')->middleware('guest');

Route::get('/remove_news_post/{id}', 'PIController@delete_news_post')->middleware('guest');

Route::get('/read_news_post/{id}', 'PIController@show_news_post')->middleware('guest');

Route::get('/like_news_post/{id}', 'PIController@like_news_post')->middleware('guest');

Route::get('/internaldirectory', 'PhoneDirectoryController@index')->middleware('guest');

Route::post('/update_contacts', 'PhoneDirectoryController@store_contacts')->middleware('guest');

Route::get('/view_user_bio/{id}', 'PIController@show_user_bio')->middleware('guest');

Route::get('/add_bio/{id}', 'PIController@add_user_bio')->middleware('guest');

Route::post('/update_bio/{id}', 'PIController@update_user_bio')->middleware('guest');

Route::get('/edit_bio/{id}', 'PIController@add_user_bio')->middleware('guest');

Route::post('/search', 'SearchController@search')->middleware('guest');

Route::get('/search', 'SearchController@index')->middleware('guest');

Route::get('/it', 'ITController@index')->middleware('guest');

Route::get('/create_it_post', 'ITController@create')->middleware('guest');

Route::post('/store_it_post', 'ITController@store_post')->middleware('guest');

Route::get('/edit_it_post/{id}', 'ITController@edit_post')->middleware('guest');

Route::post('/edit_it_post/{id}', 'ITController@update_post')->middleware('guest');

Route::get('/remove_it_post/{id}', 'ITController@destroy_post')->middleware('guest');

Route::get('/create_update', 'UpdateController@create_update')->middleware('guest');

Route::post('/store_update/{department}', 'UpdateController@store_update')->middleware('guest');

Route::get('/edit_update/{id}', 'UpdateController@edit_update')->middleware('guest');

Route::post('/edit_update/{id}', 'UpdateController@update_update')->middleware('guest');

Route::get('/remove_update/{id}', 'UpdateController@delete_update')->middleware('guest');

Route::get('/read_update/{id}', 'UpdateController@show_update')->middleware('guest');

Route::get('/like_update/{id}', 'UpdateController@like_update')->middleware('guest');

Route::get('/finance', function () {
    return view('finance')->with('department','Finance');
});

Route::get('/previous', function () {
    return view('previous');
});

Route::get('/administration', function () {
    return view('administration')->with('department','Admin');
});

Route::get('/hr', function () {
    return view('hr')->with('department','HR');
});

Route::get('/supplychain', function () {
    return view('supplychain')->with('department','Logistics');
});

Route::get('/programme', function () {
    return view('programme')->with('department','Programme');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
