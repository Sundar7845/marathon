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
Route::post('/certificate', [App\Http\Controllers\CertificateController::class, 'generateCertificate']);
Route::get('/photo', [App\Http\Controllers\PhotoController::class, 'photo'])->name('photo');
