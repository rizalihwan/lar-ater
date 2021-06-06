<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/send/message-email', 'HomeController@sendEmail')->name('email.send');

Route::resource('post', 'PostController');