<?php

// LaravelShort/ShortLink - общий неймспейс нашего пакета

Route::group(array('prefix'=>'short-link','namespace' => 'LaravelShort\ShortLink\Controllers','middleware' => ['web']), function() {
	
    Route::any('/create/', ['as' => 'short-link-create','uses' => 'ShortLinkController@create']);


});




