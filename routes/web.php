<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', 'HomeController@index');
Route::get('users/register', 'Auth\RegisterController@showRegistrationForm');
Route::get('/tickets/create', 'TicketsController@create');
Route::post('/tickets/create', 'TicketsController@store');
Route::get('/tickets', 'TicketsController@index');
Route::get('/profile/edit', 'UsersController@edit');
Route::post('/profile/edit', 'UsersController@update');
Route::get('/ticket/{slug?}', 'TicketsController@show');
Route::get('/mytickets', 'TicketsController@mytickets');
Route::get('/ticket/edit/{slug?}','TicketsController@edit');
Route::post('users/register', 'Auth\RegisterController@register');
Route::post('/ticket/edit/{slug?}','TicketsController@update');
Route::post('/ticket/{slug?}/delete','TicketsController@destroy');
Route::post('/comment', 'CommentsController@newComment');
Auth::routes();
Route::get('/home', 'HomeController@index');

Route::get('sendemail', function () {

    $data = array(
        'name' => "Learning Laravel",
    );

    Mail::send('emails.welcome', $data, function ($message) {

        $message->from('yourEmail@domain.com', 'Learning Laravel');

        $message->to('yourEmail@domain.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});






