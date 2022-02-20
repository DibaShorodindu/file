<?php

use App\Http\Controllers\FileUpload;
use Illuminate\Support\Facades\Route;
use Spatie\PdfToText\Pdf;

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
//    $path = public_path('/D:/xampp/htdocs/laravel8/'. 1);
//    $reader = new \Asika\Pdf2text;
//    $output = $reader->decode($path);
//    dd($output);
    return view('welcome');
});

Route::get('/upload-file', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');
