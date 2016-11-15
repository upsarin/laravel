<?php

// LaravelShort/ShortLink - общий неймспейс нашего пакета

Route::group(array('prefix'=>'laravel-short','namespace' => 'LaravelShort\ShortLink\Controllers','middleware' => ['web']), function() {

    Route::any('/form/', ['as' => 'laravel-short','uses' => 'ShortLinkController@index']);
    Route::any('/form/create/', ['as' => 'slaravel-short-create','uses' => 'ShortLinkController@create']);


});




