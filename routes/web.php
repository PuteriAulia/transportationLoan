<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FuelRefilController;
use App\Http\Controllers\LoanConfirmController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\TransportationController;
use App\Http\Controllers\TransportServiceController;

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

Route::group(['middleware' => 'guest'], function(){
    Route::get('login',[AuthController::class,'login'])->name('login');
    Route::post('login',[AuthController::class,'authLogin']);
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/',[DashboardController::class,'index']);
    
    Route::get('logout',[AuthController::class,'logout']);
    
    Route::resource('kendaraan',TransportationController::class);
    Route::put('kendaraan/{id}/delete',[TransportationController::class,'delete']);
    Route::get('kendaraan/{id}/detail',[TransportationController::class,'detail']);
    
    Route::resource('pengeluaran-BBM',FuelRefilController::class);
    Route::get('pengeluaran-BBM/{id}/detail',[FuelRefilController::class,'detail']);
    
    Route::resource('service',TransportServiceController::class);
    Route::get('service/{id}/detail',[TransportServiceController::class,'detail']);

    Route::resource('peminjaman',LoanController::class);
    Route::get('peminjaman/{id}/detail',[LoanController::class,'detail']);
    Route::put('peminjaman/{id}/delete',[LoanController::class,'delete']);
    Route::post('exportData',[LoanController::class,'exportDataExcel']);

    Route::resource('/pinjaman-konfirmasi',LoanConfirmController::class);
    Route::get('pengembalian/{id}',[LoanController::class,'returnview']);

});

