<?php

// LaravelNews/CallRequest - общий неймспейс нашего пакета

Route::group(array('prefix'=>'call-request','namespace' => 'LaravelNews\CallRequest\Controllers','middleware' => ['web']), function() {

    Route::any('/form', ['as' => 'call_request_form','uses' => 'CallRequestController@form']);
    Route::post('/create', ['as' => 'call_request_create','uses' => 'CallRequestController@create']);
    Route::get('/link/', ['as' => 'call_request_link','uses' => 'CallRequestController@link']);


});




