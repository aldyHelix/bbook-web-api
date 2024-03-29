<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MateriController as Materi;
use App\Http\Controllers\API\QuizController as Quiz;
use App\Http\Controllers\API\PetunjukController as Petunjuk;
use App\Http\Controllers\API\UserAuthController as UserAuth;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/materi', [Materi::class, 'index'])->name('api-materi-index');
Route::get('/materi/latest', [Materi::class, 'getLatestMateri'])->name('api-materi-latest');
Route::get('/materi/search/{key}', [Materi::class, 'getByKeySearchMateri'])->name('api-materi-search');
Route::get('/materi/bab/{bab}', [Materi::class, 'getBabMateri'])->name('api-materi-bab');
Route::get('/materi/qr/{key}', [Materi::class, 'getByQrKeySearchMateri'])->name('api-materi-qr-search');


Route::get('/materi/{id}', [Materi::class, 'getByIdMateri'])->name('api-materi-id');

Route::get('/materi-image/{id}', [Materi::class, 'getMateriImageById'])->name('api-materi-image-by-id');
Route::get('/materi-video/{id}', [Materi::class, 'getMateriVideoById'])->name('api-materi-video-by-id');
Route::get('/materi-video', [Materi::class, 'getMateriVideo'])->name('api-materi-video');

Route::get('/quiz', [Quiz::class, 'index'])->name('api-quiz');
Route::get('/quiz/{id}', [Quiz::class, 'getQuizByMateriId'])->name('api-quiz-materi-id');
Route::get('/quiz/bab/{bab}', [Quiz::class, 'getQuizByBab'])->name('api-quiz-bab');

Route::get('petunjuk', [Petunjuk::class, 'getPetunjuk'])->name('api-petunjuk');
Route::get('petunjuk/soal', [Petunjuk::class, 'getPetunjukSoal'])->name('api-petunjuk-soal');
Route::get('petunjuk/guru', [Petunjuk::class, 'getPetunjukGuru'])->name('api-petunjuk-guru');
Route::get('petunjuk/siswa', [Petunjuk::class, 'getPetunjukSiswa'])->name('api-petunjuk-siswa');
Route::get('petunjuk/about', [Petunjuk::class, 'getPetunjukAbout'])->name('api-petunjuk-About');

Route::post('/login', [UserAuth::class, 'login']);
Route::post('/register', [UserAuth::class, 'register']);
Route::post('/cek-email', [UserAuth::class, 'cekEmail']);
//quizlist
//register
//login
