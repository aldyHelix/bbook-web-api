<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MateriController as Materi;
use App\Http\Controllers\API\QuizController as Quiz;
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
Route::get('/materi/qr/{key}', [Materi::class, 'getByQrKeySearchMateri'])->name('api-materi-qr-search');

Route::get('/materi/{id}', [Materi::class, 'getByIdMateri'])->name('api-materi-id');

Route::get('/quiz/{id}', [Quiz::class, 'getQuizByMateriId'])->name('api-quiz-materi-id');

Route::post('/login', [UserAuth::class, 'login']);
Route::post('/register', [UserAuth::class, 'register']);
Route::post('/cek-email', [UserAuth::class, 'cekEmail']);
//quizlist
//register
//login     