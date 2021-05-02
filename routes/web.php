<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\RoleController as Role;
use App\Http\Controllers\UserController as User;
use App\Http\Controllers\MateriController as Materi;
use App\Http\Controllers\QuizController as Quiz;
use App\Http\Controllers\QuizOptionController as QuizOption;
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

/**
 * controllername "\HomeController"
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [Home::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {


    /**Resource Controlller */
    Route::resource('roles', Role::class);
    Route::resource('users', User::class);

    /**Custom Controller */
     Route::group(['prefix' => 'materi'], function () {
         Route::get('/', [Materi::class, 'index'])->name('materi-index');
         Route::get('/add', [Materi::class, 'add'])->name('materi-add');
         Route::get('/detail/{id}', [Materi::class, 'showDetails'])->name('materi-details');
         Route::post('/insert', [Materi::class, 'insert'])->name('materi-insert');
         Route::get('/edit/{id}', [Materi::class, 'edit'])->name('materi-edit');
         Route::put('/update/{id}', [Materi::class, 'update'])->name('materi-update');
         Route::get('/delete/{id}', [Materi::class, 'destroy'])->name('materi-delete');
         Route::put('/update/content/{id}', [Materi::class, 'updateKonten'])->name('materi-update-konten');
     });

     Route::group(['prefix' => 'quiz'], function () {
        Route::get('/', [Quiz::class, 'show']);
        Route::get('/add', [Quiz::class, 'add']);
        Route::post('/insert', [Quiz::class, 'insert']);
        Route::get('/edit/{id}', [Quiz::class, 'edit']);
        Route::put('/update/{id}', [Quiz::class, 'update']);
        Route::get('/delete/{id}', [Quiz::class, 'delete']);
    });

    Route::group(['prefix' => 'quiz-option'], function () {
        Route::get('/', [QuizOption::class, 'show']);
        Route::get('/add', [QuizOption::class, 'add']);
        Route::post('/insert', [QuizOption::class, 'insert']);
        Route::get('/edit/{id}', [QuizOption::class, 'edit']);
        Route::put('/update/{id}', [QuizOption::class, 'update']);
        Route::get('/delete/{id}', [QuizOption::class, 'delete']);
    });
});


// Route::group(['prefix' => 'end-user'], function () {
//     Route::get('/', 'EndUserController@show');
//     Route::get('/add', 'EndUserController@add');
//     Route::get('/edit/{id}', 'EndUserController@edit');
//     Route::post('/insert', 'EndUserController@insert');
//     Route::put('/update/{id}', 'EndUserController@update');
//     Route::get('/delete/{id}', 'EndUserController@delete');
//     Route::group(['prefix' => 'answer'], function () {
//         Route::get('/', 'UserAnswerController@show');
//     });
// });
// Route::group(['prefix' => 'materi'], function () {
//     Route::get('/', 'MateriController@show');
//     Route::get('/add', 'MateriController@add');
//     Route::get('/detail/{id}', 'MateriController@showDetails');
//     Route::post('/insert', 'MateriController@insert');
//     Route::get('/edit/{id}', 'MateriController@edit');
//     Route::put('/update/{id}', 'MateriController@update');
//     Route::get('/delete/{id}', 'MateriController@delete');
// });
// Route::group(['prefix' => 'konten'], function () {
//     Route::get('/', 'KontenController@show');
//     Route::get('/add', 'KontenController@add');
//     Route::post('/insert', 'KontenController@insert');
//     Route::get('/edit/{id}', 'KontenController@edit');
//     Route::put('/update/{id}', 'KontenController@update');
//     Route::get('/delete/{id}', 'KontenController@delete');
//     Route::get('/detail/{id}', 'KontenController@details');
// });
// Route::group(['prefix' => 'quiz'], function () {
//     Route::get('/', 'QuizController@show');
//     Route::get('/add', 'QuizController@add');
//     Route::post('/insert', 'QuizController@insert');
//     Route::get('/edit/{id}', 'QuizController@edit');
//     Route::put('/update/{id}', 'QuizController@update');
//     Route::get('/delete/{id}', 'QuizController@delete');
// });
// Route::group(['prefix' => 'quiz-option'], function () {
//     Route::get('/', 'QuizOptionController@show');
//     Route::get('/add', 'QuizOptionController@add');
//     Route::post('/insert', 'QuizOptionController@insert');
//     Route::get('/edit/{id}', 'QuizOptionController@edit');
//     Route::put('/update/{id}', 'QuizOptionController@update');
//     Route::get('/delete/{id}', 'QuizOptionController@delete');
// });