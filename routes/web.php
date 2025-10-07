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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/certificate', function () {
    return view('certificate');
});
Route::get('/certificate/{id}', [App\Http\Controllers\CertificateController::class, 'generateCertificate'])->name('certificate');
Route::get('/E-certificate', [App\Http\Controllers\PhotoController::class, 'photo'])->name('e-certificate'); // Step 0 -> Step 1
Route::post('/login', [App\Http\Controllers\PhotoController::class, 'login'])->name('login');                    // Step 1 -> Step 2
Route::get('/select', [App\Http\Controllers\PhotoController::class, 'selectParticipant'])->name('select');       // Step 2: choose record
Route::get('/upload/{participant}', [App\Http\Controllers\PhotoController::class, 'uploadForm'])->name('upload.form'); // Step 3: upload ui
Route::post('/upload/{participant}', [App\Http\Controllers\PhotoController::class, 'upload'])->name('upload');   // Step 3 -> Step 4
Route::get('/preview/{participant}', [App\Http\Controllers\PhotoController::class, 'preview'])->name('preview'); // Step 4: preview + download
Route::get('/download/{participant}', [App\Http\Controllers\PhotoController::class, 'download'])->name('download');
Route::post('/participants/{participant}/save-poster', [App\Http\Controllers\PhotoController::class, 'savePoster'])->name('participants.savePoster');
