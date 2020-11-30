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

//Cart
// Route::match(['get','post'],'/add-cart','CartController@addtoCart')->name('add-to-cart');
Route::get('cart', 'CartController@cart');
Route::get('add-to-cart/{id}', 'CartController@addToCart');
Route::patch('update-cart', 'CartController@update');
Route::delete('remove-from-cart', 'CartController@remove');

//Next Routes
Route::get('/products', 'PagesController@products')->name('all.products');
Route::get('/certifications', 'PagesController@certification')->name('pages.certifications');
Route::get('/exam/{id}', 'PagesController@exam')->name('pages.singleExam');
Route::get('/products/{id}', 'PagesController@singleProduct')->name('pages.singleProduct');
Route::get('/vendors/{id}', 'PagesController@vendor')->name('pages.singleVendor');

//Admin Panel Routes
Route::group(['middleware' => ['auth']], function(){
    
    Route::match(['get','post'],'/admin', 'PagesController@adminIndex')->name('admin.index');
    Route::match(['get','post'],'/admin/vendors', 'PagesController@allvendors')->name('admin.all.vendors');
    Route::match(['get','post'],'/admin/certifications', 'PagesController@certifications')->name('admin.all.certifications');
    Route::match(['get','post'],'/admin/exams', 'PagesController@exams')->name('admin.all.exams');
    Route::match(['get','post'],'/admin/vouchers', 'PagesController@vouchers')->name('admin.all.vouchers');

    //Product Category
    Route::match(['get','post'],'/admin/categories', 'PagesController@categories')->name('admin.all.categories');

    //Products
    Route::match(['get','post'],'/admin/products', 'PagesController@allProducts')->name('admin.all.products');

    //Checkout
    Route::get('/checkout', 'CheckoutController@getCheckout')->name('checkout.index');
    Route::post('/checkout/order', 'CheckoutController@placeOrder')->name('checkout.place.order');
    Route::get('/invoice', 'CheckoutController@invoice')->name('invoice');

    //Payment Gateway Integration
    Route::post('/create-payment', 'PaymentController@create')->name('create-payment');
    Route::match(['get','post'],'/success-payment', 'PaymentController@success')->name('success');

});
