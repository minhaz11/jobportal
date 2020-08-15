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
Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'FrontendController@index')->name('landing');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin\Auth', 'as'=>'admin.'], function(){
    //--------Admin login-----//
     Route::get('login', 'LoginController@showLoginForm')->name('login');
     Route::post('login', 'LoginController@login')->name('login.dashboard');
     Route::post('logout', 'LoginController@logout')->name('logout');
     
     //----register---//
     // Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
     // Route::post('register', 'RegisterController@register')->name('registered');
 
     //Forgot Password Routes
      Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
      Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  
      //Reset Password Routes
      Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
      Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

    
   
 });


Route::group(['prefix'=>'employer', 'namespace'=>'Employer\Auth', 'as'=>'employer.'], function(){
   
     Route::get('login', 'LoginController@showLoginForm')->name('login');
     Route::post('login', 'LoginController@login')->name('login.dashboard');
     Route::post('logout', 'LoginController@logout')->name('logout');
     
     //----register---//
     // Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
     // Route::post('register', 'RegisterController@register')->name('registered');
 
     //Forgot Password Routes
      Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
      Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  
      //Reset Password Routes
      Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
      Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

    
   
 });


 Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'as'=>'admin.','middleware'=>'auth:admin'], function(){
    
  Route::get('/dashboard','AdminController@index')->name('dashboard');
 });