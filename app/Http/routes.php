<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use URLService\Models\Index;
use URLService\Models\Short;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {
    /**
     * Main page
     */
		Route::get('/', "IndexController@index");
		
		Route::get('/shortlist/', "ShortListController@index");

});
