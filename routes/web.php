<?php

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

Route::get('', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['prefix' => 'api'], function(){
//     //Route::get('/materi', 'ApiMateriController@getMateri');
//     Route::post('/login', 'AuthController@login');
//     Route::post('/register', 'AuthController@register');
//     Route::group(['middleware' => 'auth:api'], function(){
//         Route::get('/logout', 'AuthController@logout');
//         Route::get('/materi', 'ApiMateriController@getMateri');
//     });
// });
Route::group(['prefix' => 'end-user'], function () {
    Route::get('/', 'EndUserController@show');
    Route::get('/add', 'EndUserController@add');
    Route::get('/edit/{id}', 'EndUserController@edit');
    Route::post('/insert', 'EndUserController@insert');
    Route::put('/update/{id}', 'EndUserController@update');
    Route::get('/delete/{id}', 'EndUserController@delete');
    Route::group(['prefix' => 'answer'], function () {
        Route::get('/', 'UserAnswerController@show');
    });
});
Route::group(['prefix' => 'materi'], function () {
    Route::get('/', 'MateriController@show');
    Route::get('/add', 'MateriController@add');
    Route::get('/detail/{id}', 'MateriController@showDetails');
    Route::post('/insert', 'MateriController@insert');
    Route::get('/edit/{id}', 'MateriController@edit');
    Route::put('/update/{id}', 'MateriController@update');
    Route::get('/delete/{id}', 'MateriController@delete');
});
Route::group(['prefix' => 'konten'], function () {
    Route::get('/', 'KontenController@show');
    Route::get('/add', 'KontenController@add');
    Route::post('/insert', 'KontenController@insert');
    Route::get('/edit/{id}', 'KontenController@edit');
    Route::put('/update/{id}', 'KontenController@update');
    Route::get('/delete/{id}', 'KontenController@delete');
    Route::get('/detail/{id}', 'KontenController@details');
});
Route::group(['prefix' => 'quiz'], function () {
    Route::get('/', 'QuizController@show');
    Route::get('/add', 'QuizController@add');
    Route::post('/insert', 'QuizController@insert');
    Route::get('/edit/{id}', 'QuizController@edit');
    Route::put('/update/{id}', 'QuizController@update');
    Route::get('/delete/{id}', 'QuizController@delete');
});

