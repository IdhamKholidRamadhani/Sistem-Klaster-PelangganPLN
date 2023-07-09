<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Kmedoids2Controller;
use App\Http\Controllers\KmedoidsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RawDataController;
use App\Http\Controllers\KnnController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Auth;
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
Route::post('/Cari',[PageController::class, 'search']);

//Auth
Route::get('Login',[AuthController::class,'viewlogin'])->name('Login');
Route::post('ActionLogin',[AuthController::class,'actionLogin'])->name('actionlogin');

Route::get('Register',[AuthController::class,'viewregister']);
Route::post('ActionRegister', [AuthController::class, 'actionRegister'])->name('actionRegister');

Route::middleware(['auth','cekrole:dinsos'])->group(function () {
    //Dash
    Route::get('Chart-Admin', [DashboardController::class, 'chartDataDinsos']);

    //Upload
    Route::get('Upload-Data-Raw',[RawDataController::class, 'viewUpload']);
    Route::post('Import-File-Raw',[RawDataController::class, 'uploadFile']);
    Route::post('Import-Data-Raw',[RawDataController::class, 'uploadData']);
    Route::get('Table-Raw',[RawDataController::class,'datatable']);
    Route::get('Data-Raw',[RawDataController::class, 'viewData'])->name('Data-Raw');

    //Proses Hitung KMedoids
    Route::get('Hasil-Klaster',[KmedoidsController::class, 'viewTableKlaster'])->name('Hasil-Klaster');

    //Knn
    Route::get('Data-Result/Tambah-Data-Baru',[KnnController::class, 'viewFormKNN']);
    Route::post('Proses-Prediksi',[KnnController::class, 'knn'])->name('Proses-Prediksi');

    //Hasil
    Route::post('Data-From-Raw',[ResultController::class, 'DataTable_from_dataRaw']);
    Route::get('Data-Result',[ResultController::class, 'viewResult']);
    Route::get('Result',[ResultController::class,'viewDataResult'])->name('Result');
    Route::get('Export-Excel',[ResultController::class,'exportExcel']);
    Route::get('Export-PDF',[ResultController::class,'exportPDF']);
});

Route::middleware(['auth','cekrole:dinsos,pln'])->group(function (){
    //Dash
    Route::get('Dashboard',[DashboardController::class, 'dashboard']);

    Route::get('Chart-Pln', [DashboardController::class, 'chartDataPln']);
    Route::get('Profile',[ProfileController::class,'viewProfile']);
    Route::post('Update-Profile/{id}',[ProfileController::class,'updateProfile']);

    //Hasil
    Route::post('Data-From-Raw',[ResultController::class, 'DataTable_from_dataRaw']);
    Route::get('Data-Result',[ResultController::class, 'viewResult']);
    Route::get('Result',[ResultController::class,'viewDataResult'])->name('Result');
    // Route::get('Export-Excel',[ResultController::class,'exportExcel']);
    Route::get('Export-Excel-PLN',[ResultController::class,'exportExcelPLN']);
    // Route::get('Export-PDF',[ResultController::class,'exportPDF']);
    Route::get('Export-PDF-PLN',[ResultController::class,'exportPDFPLN']);

    //Logout
    Route::post('ActionLogout',[AuthController::class,'actionLogout'])->name('Logout');
});

//test
// Route::get('Test-Hasil-Klaster',[Kmedoids2Controller::class, 'kMedoid']);
// Route::get('Test-MinMax',[Kmedoids2Controller::class, 'median']);
