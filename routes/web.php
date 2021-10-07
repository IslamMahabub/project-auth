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

// Home Route
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

// Default Auth Route
Auth::routes();

// Google Auth Route
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

// OTP Auth Route
Route::get('auth/otp', 'OTPController@login')->name('login-with-otp');
Route::post('auth/otp', 'OTPController@loginWithOtp')->name('login-with-otp');
Route::post('send-otp', 'OTPController@sendOtp')->name('send-otp');

// Authorized Route
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('profiles','ProfileController');
});

// Test Email Route
Route::get('test/email', function(){
    $send_mail = 'mahabub.webappick@gmail.com';
    dispatch(new App\Jobs\SendEmailJob($send_mail));
    dd('send mail successfully !!');
});
