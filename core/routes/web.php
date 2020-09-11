<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin\Auth', 'as' => 'admin.'], function () {
    //--------Admin login-----//
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login.dashboard');
    Route::post('logout', 'LoginController@logout')->name('logout');

    //----register---//
    // Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    // Route::post('register', 'RegisterController@register')->name('registered');

    //Forgot Password Routes
    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    //Reset Password Routes
    Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');

});

Route::group(['prefix' => 'employer', 'namespace' => 'Employer\Auth', 'as' => 'employer.'], function () {

    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login.dashboard');
    Route::post('logout', 'LoginController@logout')->name('logout');

    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register')->name('registered');

    //Forgot Password Routes
    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    //Reset Password Routes
    Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'ResetPassbmarvin@example.comwordController@reset')->name('password.update');

});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {

    //category
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    Route::get('/category/all', 'CategoryController@index')->name('category.all');
    Route::post('/category/add', 'CategoryController@store')->name('category.add');
    Route::post('/category/{id}/update', 'CategoryController@edit')->name('category.update');
    Route::get('/category/{id}/details', 'CategoryController@details')->name('category.details');

    //manage joobseker
    Route::get('/jobseeker/all', 'JobseekerController@index')->name('jobseeker.all');
    Route::get('/jobseeker/trashed/all', 'JobseekerController@trashed')->name('jobseeker.trashed.all');
    Route::get('/jobseeker/destroy/{id}', 'JobseekerController@permanentDelete')->name('jobseeker.destroy');
    Route::get('/jobseeker/restore/{id}', 'JobseekerController@restore')->name('jobseeker.restore');
    Route::get('/jobseeker/{id}/disable', 'JobseekerController@destroy')->name('jobseeker.disable');
    Route::get('/jobseeker/delete/{id}', 'JobseekerController@permanentDelete')->name('jobseeker.delete');

    //manage employer

    Route::get('/employer/all', 'EmployerController@index')->name('employer.all');
    Route::get('/employer/{id}/disable', 'EmployerController@destroy')->name('employer.disable');
    Route::get('/employer/trashed/all', 'EmployerController@trashed')->name('employer.trashed.all');
    Route::get('/employer/destroy/{id}', 'EmployerController@permanentDelete')->name('employer.destroy');
    Route::get('/employer/restore/{id}', 'EmployerController@restore')->name('employer.restore');

//manage jobs
    Route::get('/job/all', 'JobController@index')->name('job.all');

});

Route::group(['prefix' => 'employer', 'namespace' => 'Employer', 'as' => 'employer.', 'middleware' => 'auth:employer'], function () {

    Route::get('/dashboard', 'EmployerController@index')->name('dashboard');

    //mange jobs
    Route::get('/all/jobs', 'JobController@index')->name('job.all');
    Route::get('/job/add', 'JobController@add')->name('job.add');
    Route::post('/job/store', 'JobController@store')->name('job.store');
    Route::get('/job/edit/{id}', 'JobController@edit')->name('job.edit');
    Route::post('/job/update/{id}', 'JobController@update')->name('job.update');
    Route::post('/job/details/{id}', 'JobController@details')->name('job.details');

});

Route::group(['namespace' => 'JobSeeker', 'as' => 'jobseeker.', 'middleware' => 'auth:web'], function () {
    Route::get('profile', 'HomeController@index')->name('profile');
    Route::post('profile/update/{id}', 'HomeController@profileUpdate')->name('profile.update');
    Route::post('profile/update/image/{id}', 'HomeController@updateProfileImage')->name('profile.image.update');
});
