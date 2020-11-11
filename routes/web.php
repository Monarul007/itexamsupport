<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/user_register', 'UsersController@memberRegister')->name('Uregister');
Route::match(['get','post'],'/member_register', 'UsersController@register')->name('member.register');
Route::match(['get','post'],'/contact-us', 'PagesController@index')->name('contactus');
Route::match(['get','post'],'/blog-us', 'PagesController@blog')->name('blog');
Route::match(['get','post'],'/post/{id}', 'PagesController@singlePost')->name('single.post');


//Next Routes
Route::get('/products', 'PagesController@products')->name('all.products');
Route::get('/certifications', 'PagesController@certification')->name('pages.certifications');
Route::get('/exam/{id}', 'PagesController@exam')->name('pages.singleExam');

//Admin Panel Routes
Route::group(['middleware' => ['auth']], function(){
    
    Route::match(['get','post'],'/admin', 'PagesController@adminIndex')->name('admin.index');
    Route::match(['get','post'],'/admin/vendors', 'PagesController@vendors')->name('admin.all.vendors');
    Route::match(['get','post'],'/admin/certifications', 'PagesController@certifications')->name('admin.all.certifications');
    Route::match(['get','post'],'/admin/exams', 'PagesController@exams')->name('admin.all.exams');

});
