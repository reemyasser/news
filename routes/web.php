<?php

use Illuminate\Support\Facades\Route;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization as FacadesLaravelLocalization;

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

Route::group(['prefix' => FacadesLaravelLocalization::setLocale()], function(){

     session()->put('lang', FacadesLaravelLocalization::setLocale());
  

    Route::group(['namespace'=>'front'],function(){
Route::get('/', 'siteController@home')->name('home');
Route::get('/search','siteController@search')->name('search');
Route::get('category/{id}','siteController@category')->name('category');

Route::get('/show-single-news/{id}','siteController@single_news')->name('show-single-news');
Route::get('/show-single-book/{id}','siteController@single_book')->name('show-single-book');
    });


//_________________  end create news________________
Route::group(['namespace'=>'dashboard'],function(){
    Route::get('/dashboard','NewsController@index')->name('dashboard');
Route::get('/create-news','NewsArController@create')->name('create-news');
Route::post('/store-news_ar','NewsArController@store')->name('store.news_ar');
Route::post('/store-img-num','NewsArController@store_img')->name('store.img-num');
Route::post('/store-des-num','NewsArController@store_des_ar')->name('store.des');
Route::post('/store-des-en-num','NewsArController@store_des_en')->name('store.des_en');
Route::post('/store-news_en','NewsEnController@store')->name('store.news_en');

//_________________  end create news________________


//_________________ create category________________

Route::get('/create-category','TypeArController@create')->name('create.category');
Route::post('/store-category_ar','TypeArController@store')->name('store.category_ar');
Route::post('/store-category_en','TypeEnController@store')->name('store.category_en');

//_________________  end create category________________
//_______________________delete category___________

Route::get('/delete-category_ar/{id}','TypeArController@destroy')->name('delete.category_ar');
Route::get('/delete-category_en/{id}','TypeEnController@destroy')->name('delete.category_en');
//_______________________ end delete category___________
//_______________________  edit category___________



Route::get('/edit-category/{id}','TypeArController@edit')->name('edit.category');
Route::post('/update-category_ar/{id}','TypeArController@update')->name('update.category_ar');
//Route::get('/edit-category-en/{id}','TypeEnController@edit')->name('edit.category_en');
Route::post('/update-category_en/{id}','TypeEnController@update')->name('update.category_en');

//_______________________ end edit category___________
//_______________________  show news_category___________
Route::get('/show-categorynews/{id}','NewsArController@news_category')->name('show.categorynews');
//Route::get('/show-categorynews-en/{id}','NewsEnController@news_category')->name('show.categorynews_en');
//_______________________ end show news_category___________
//_______________________ show all news___________


Route::get('/show-all-news','NewsController@show_ar')->name('show.allnews');
//Route::get('show-all-news_en','NewsController@show_en')->name('show.allnews_en');
//_______________________ end show all news___________
//_______________________ edit news___________
Route::get('/edit-news/{id}','NewsArController@edit')->name('edit.news');
Route::post('/update-news_ar/{id}','NewsArController@update')->name('update.news_ar');
//Route::get('/edit-news_en/{id}','NewsEnController@edit')->name('edit.news_en');
Route::post('/update-news_en/{id}','NewsEnController@update')->name('update.news_en');
//_______________________ end edit news___________
//_______________________  delete news___________
Route::get('/delete-news_en/{id}','NewsEnController@destroy')->name('delete.news_en');
Route::get('/delete-news_ar/{id}','NewsArController@destroy')->name('delete.news_ar');
//_______________________ end delete news___________
//_______________________  create book___________
Route::get('/create-book','BookArController@create')->name('create.book');
Route::post('/create-book_ar','BookArController@store')->name('create.book_ar');
Route::post('/create-book_en','BookEnController@store')->name('create.book_en');
//_______________________ end create book___________

Route::get('show-all-book','BookArController@show')->name('show.all.books');
//Route::get('show-all-book_en','BookEnController@show')->name('show.all.books_en');

Route::get('delete-book_ar/{id}','BookArController@destroy')->name('delete.books_ar');
Route::get('delete-book_en/{id}','BookEnController@destroy')->name('delete.books_en');

Route::get('edit-book/{id}','BookArController@edit')->name('edit.books');
//Route::get('edit-book_en/{id}','BookEnController@edit')->name('edit.books_en');
Route::post('update-book_ar/{id}','BookArController@update')->name('update.books_ar');
Route::post('update-book_en/{id}','BookEnController@update')->name('update.books_en');

Route::post('/convert','NewsArController@convert')->name('convert');

});
});
