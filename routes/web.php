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


Route::group(['middleware' => ['auth']], function () {
	Route::get('/admin', function () {
		return view('home');
	});
	Route::resource('books', 'BooksController');
	Route::resource('category', 'CategoryController');

	Route::get('/home', 'HomeController@index');
});
Auth::routes();

Route::get('/contact',[
        'uses' => 'PageController@getContact',
        'as' => 'news.contactus'
    ]);
Route::post('/contactstore',[
        'uses' => 'PageController@postContactStore',
        'as' => 'news.contactstore'
    ]);



Route::get('/', ['as'=>'get.home', 'uses'=>'PageController@getHome']);
Route::get('bookdetails/{id}',['as'=>'bookdetails', 'uses'=>'PageController@getBookdetails']);
Route::get('book/{id}/downlode', ['as'=> 'bookdownlode', 'uses'=>'PageController@bookDownlode']);
Route::get('/upload',['as'=>'get.upload','uses'=>'PageController@getUpload']);
Route::post('/postupload',['as'=>'post.upload','uses'=>'PageController@postUpload']);
Route::get('/allcategory',['as'=>'get.allcategory','uses'=>'PageController@getAllCategory']);












