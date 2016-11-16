<?php

// LaravelShort/ShortLink - общий неймспейс нашего пакета

Route::group(array('prefix'=>'short-link','namespace' => 'LaravelShort\ShortLink\Controllers','middleware' => ['web']), function() {

    Route::any('/link/', ['as' => 'short','uses' => 'ShortLinkController@index']);
    Route::any('/link/create/', ['as' => 'short-create','uses' => 'ShortLinkController@create']);


});




