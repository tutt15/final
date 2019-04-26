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

Route::get('/',['as'=> 'home','uses'=>'PageController@getIndex']);

Route::get('/product',['as'=>'product','uses'=>'PageController@getProduct']);

Route::get('/producttype/{type}',['as'=>'producttype','uses' =>'PageController@getProductType']);

Route::get('/productdetail/{id}',['as'=>'productdetail','uses'=>'PageController@getProductDetail']);

Route::get('/loginn',['as'       =>'loginn','uses' =>'PageController@getLogin']);
Route::post('loginn',['as'       => 'loginn','uses'=>'PageController@postLogin']);
Route::get('/register',['as'     => 'register','uses'=>'PageController@getRegister']);
Route::post('/register',['as'    => 'register','uses'=>'PageController@postRegister']);
Route::get('/logout', ['as'       => 'logout','uses'=>'PageController@getLogout']);
Route::get('/addcart/{id}',['as' => 'addcart','uses'=>'CartController@getAddtoCart'
]);

Route::get('/cart',['as'=>'cart','uses'=>'CartController@show']);

//  add cart nit
Route::get('/addcartaj',['as'=>'addcartaj','uses'=>'CartAjController@getAddtoCart'
]);
Route::get('/updatecart/{id}',['as'=>'updatecart','uses'=>'CartAjController@getUpdateCart'
]);
Route::get('showcart',['as'=>'showcart','uses'=>'CartAjController@getShowCart']);
Route::delete('/cart/{id}','CartAjController@destroy')->name('cart.destroy');

Route::get('bills',['as'=>'bills','uses' => 'CartAjController@getShowBill']);

Route::post('/bills', ['as'=>'bills','uses'=>'CartAjController@postCheckOut']);

Route::get('/contact', 'PageController@getContact');
Route::post('/contact', ['as'=>'contact','uses'=>'PageController@postContact']);

Route::get('/about',['as'=>'about','uses' => 'PageController@getAbout']);

Route::get('/blog',['as'=>'blog','uses'=>'PageController@getBlog']);

Route::get('/blogdetail/{id?}',['as'=> 'blogdetail','uses' => 'PageController@getBlogSingle']);

Route::get('/search',['as'=>'search','uses' =>'PageController@getSearch'
]);

Route::post('/comment/{id}',['as'=>'comment', 'uses'=>'CommentController@postComment']);

///Admin

Route::get('/ad', 'PageController@getLoginAdmin')->name('ad');
Route::post('/homepage', 'PageController@getAdmin')->name('homepage');

///Loại sản phẩm
Route::get('ad/productType', 'ProductTypeController@index')->name('productType.index');
Route::get('ad/productType/create', 'ProductTypeController@create')->name('productType.create');
Route::post('ad/productType', 'ProductTypeController@store')->name('productType.store');
Route::get('ad/productType/{id}', 'ProductTypeController@show')->name('productType.show');
Route::delete('ad/productType/{id}', 'ProductTypeController@destroy')->name('productType.destroy');
Route::get('ad/productType/{id}/edit', 'ProductTypeController@edit')->name('productType.edit');
Route::put('ad/productType/{id}', 'ProductTypeController@update')->name('productType.update');

/// Users
Route::get('ad/users', 'UserController@index')->name('users.index');
Route::post('ad/users', 'UserController@store')->name('users.store');
Route::get('ad/users/{id}', 'UserController@show')->name('users.show');
Route::delete('ad/users/{id}', 'UserController@destroy')->name('users.destroy');
Route::get('ad/users/{id}/edit', 'UserController@edit')->name('users.edit');
Route::put('ad/users/{id}', 'UserController@update')->name('users.update');

///Product
Route::get('ad/product/index', 'ProductController@index')->name('product.index');
Route::get('ad/product/create', 'ProductController@create')->name('product.create');
Route::post('ad/product', 'ProductController@store')->name('product.store');
Route::get('ad/product/{id}/', 'ProductController@show')->name('product.show');
Route::delete('ad/product/{id}', 'ProductController@destroy')->name('product.destroy');
Route::get('ad/product/{id}/edit', 'ProductController@edit')->name('product.edit');
Route::put('ad/product/{id}', 'ProductController@update')->name('product.update');

///Bill
Route::get('ad/bills', 'BillController@index')->name('bills.index');
Route::get('ad/bills/{id}', 'BillController@show')->name('bills.show');
Route::delete('ad/bills/{id}', 'BillController@destroy')->name('bills.destroy');
Route::get('ad/bills/{id}/edit', 'BillController@edit')->name('bills.edit');
Route::put('ad/bills/{id}', 'BillController@update')->name('bills.update');

///News
Route::get('ad/news/index', 'NewsController@index')->name('news.index');
Route::get('ad/news/create', 'NewsController@create')->name('news.create');
Route::post('ad/news', 'NewsController@store')->name('news.store');
Route::get('ad/news/{id}/', 'NewsController@show')->name('news.show');
Route::delete('ad/news/{id}', 'NewsController@destroy')->name('news.destroy');
Route::get('ad/news/{id}/edit', 'NewsController@edit')->name('news.edit');
Route::put('ad/new/{id}', 'NewsController@update')->name('news.update');









