<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\RoleController as Role;
use App\Http\Controllers\UserController as User;
use App\Http\Controllers\MateriController as Materi;
use App\Http\Controllers\MateriImageController as MateriImage;
use App\Http\Controllers\MateriVideoController as MateriVideo;
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
         Route::get('/video', [Materi::class, 'listVideo'])->name('materi-video-list');
         Route::post('/video/add', [Materi::class, 'addVideo'])->name('materi-video-add');
         Route::put('/video/edit', [Materi::class, 'editVideo'])->name('materi-video-edit');
         Route::delete('/video/delete', [Materi::class, 'deleteVideo'])->name('materi-video-delete');
     });

    Route::group(['prefix' => 'materi-image'], function () {
        Route::post('/insert', [MateriImage::class, 'insert'])->name('materi-image-insert');
        Route::put('/update/{id}', [MateriImage::class, 'update'])->name('materi-image-update');
        Route::get('/delete/{id}', [MateriImage::class, 'destroy'])->name('materi-image-delete');
    });

    Route::group(['prefix' => 'materi-video'], function () {
        Route::post('/insert', [MateriVideo::class, 'insert'])->name('materi-video-insert');
        Route::put('/update/{id}', [MateriVideo::class, 'update'])->name('materi-video-update');
        Route::get('/delete/{id}', [MateriVideo::class, 'destroy'])->name('materi-video-delete-video');
    });

    Route::group(['prefix' => 'quiz'], function () {
        Route::get('/', [Quiz::class, 'show']);
        Route::get('/add', [Quiz::class, 'add']);
        Route::post('/insert', [Quiz::class, 'insert']);
        Route::get('/edit/{id}', [Quiz::class, 'edit']);
        Route::put('/update/{id}', [Quiz::class, 'update']);
        Route::get('/delete/{id}', [Quiz::class, 'delete']);
    });
});
