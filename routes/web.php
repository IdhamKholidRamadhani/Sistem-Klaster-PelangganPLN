<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KmedoidsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RawDataController;
use App\Http\Controllers\KnnController;
use App\Http\Controllers\ResultController;
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

// Landing Page
Route::get('/',[PageController::class, 'index']);

//Auth
Route::get('Login',[AuthController::class,'viewlogin']);
Route::get('Register',[AuthController::class,'viewregister']);
Route::post('Send-Register', [RegisterController::class, 'sendRegister']);

//Dash
Route::get('Dashboard',[DashboardController::class, 'dashboard']);

//Upload
Route::get('Upload-Data-Raw',[RawDataController::class, 'viewUpload']);
Route::post('Import-File-Raw',[RawDataController::class, 'uploadFile']);
Route::post('Import-Data-Raw',[RawDataController::class, 'uploadData']);
Route::get('Table-Raw',[RawDataController::class,'datatable']);
Route::get('Data-Raw',[RawDataController::class, 'viewData'])->name('Data-Raw');

//Proses Hitung KMedoids
// Route::get('Titik-Klaster',[KmedoidsController::class, 'median']);
Route::get('Hasil-Klaster',[KmedoidsController::class, 'viewTableKlaster'])->name('Hasil-Klaster');

//Knn
Route::get('Data-Result/Tambah-Data-Baru',[KnnController::class, 'viewFormKNN']);

//Hasil
Route::post('Data-From-Raw',[ResultController::class, 'DataTable_from_dataRaw']);
Route::get('Data-Result',[ResultController::class, 'viewResult']);
Route::get('Result',[ResultController::class,'viewDataResult'])->name('Result');
