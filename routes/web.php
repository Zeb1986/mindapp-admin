<?php

use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\S3Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/upload-s3', [S3Controller::class, 'index'])->name('upload-s3');
Route::resource('images', S3Controller::class, ['only' => ['store', 'destroy']]);
