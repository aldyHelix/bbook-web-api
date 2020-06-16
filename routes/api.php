<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
    Route::post('/login', 'API\UserAuthController@login');
    Route::post('/register', 'API\UserAuthController@register');
    Route::post('/cek-email', 'API\UserAuthController@cekEmail');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('/materi', 'API\UserAuthController@materi');
        Route::get('/get-materi/{id}', 'API\UserAuthController@getMateri');
        Route::get('/get-materi-quiz/{id}', 'API\UserAuthController@getMateriQuiz');
        Route::get('/logout', 'API\UserAuthController@logout');
        Route::get('/user', 'API\UserAuthController@user');
    });

