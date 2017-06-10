<?php
use Illuminate\Http\Request;
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
Route::group(['middleware' => 'web'], function(){
  Route::group(['prefix' => 'admin'], function(){
    Route::get('search', 'AdminController@search')->name('admin.search');
    Route::resource('product', 'ProductController');
    Route::get('category/{category}/products', 'AdminController@categoryProducts')->name('category.products');
    Route::get('subCategory/{category}/products', 'AdminController@subCategoryProducts')->name('subCategory.products');
    Route::get('main_category', 'MainCategoryController@index')->name('mainCategory.index');
    Route::get('main_category/{main_category}/edit', 'MainCategoryController@edit')->name('mainCategory.edit');
    Route::put('main_category/{main_category}', 'MainCategoryController@update')->name('mainCategory.update');
    Route::resource('subCategory', 'SubCategoryController');
    Route::resource('category', 'CategoryController');
    Route::resource('sellerData', 'SellerDataController');
    Route::post('seller', 'SellerController@store')->name('seller.store');
    Route::put('seller/{seller}', 'SellerController@update')->name('seller.update');
    Route::delete('seller/{seller}', 'SellerController@destroy')->name('seller.destroy');
    Route::get('/', 'AdminController@index')->name('admin');
  });
  Route::get('/search', 'GuestController@search')->name('guest.search');
  Route::get('/login', 'LoginController@create')->name('loginPage');
  Route::post('/login', 'LoginController@store')->name('login');
  Route::get('/logout', 'LoginController@destroy')->name('logout');
  Route::get('/product/{product}', 'GuestController@single')->name('front.single');
  Route::get('/category/{category}/products', 'GuestController@categoryProducts')->name('category.guestProducts');
  Route::get('/', 'GuestController@index')->name('home');
});
