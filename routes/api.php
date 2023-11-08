<?php

use App\Http\Controllers\API\Pegawai\Auth\LoginController as PegawaiLogin;
use App\Http\Controllers\API\Pegawai\GetPengaduanController as PegawaiGetPengaduanController;
use App\Http\Controllers\API\Pegawai\PengaduanSelesaiController;
use App\Http\Controllers\API\Pegawai\ProsesPengaduanController;
use App\Http\Controllers\API\Pelanggan\Auth\LoginController as PelangganLogin;
use App\Http\Controllers\API\Pelanggan\Auth\LogoutController;
use App\Http\Controllers\API\Pelanggan\GetAllSurveyController;
use App\Http\Controllers\API\Pelanggan\GetBacaMeter;
use App\Http\Controllers\API\Pelanggan\GetPengaduanController;
use App\Http\Controllers\API\Pelanggan\GetPengumumanController;
use App\Http\Controllers\API\Pelanggan\GetRekeningController;
use App\Http\Controllers\API\Pelanggan\GetSurveyByIdController;
use App\Http\Controllers\API\Pelanggan\GetTagihanController;
use App\Http\Controllers\API\Pelanggan\GiveRateController;
use App\Http\Controllers\API\Pelanggan\JawabSurveyController;
use App\Http\Controllers\API\Pelanggan\PostMeterController;
use App\Http\Controllers\API\Pelanggan\PostPengaduanController;
use App\Http\Controllers\API\Pelanggan\RegisterPelangganController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post("/pelanggan/login", PelangganLogin::class);
Route::post("/pelanggan/register", RegisterPelangganController::class);
Route::post("/pegawai/login", PegawaiLogin::class);
Route::get("/logout", LogoutController::class) -> middleware('auth:sanctum');


Route::group(["prefix" => "rekening", "middleware" => ["auth:sanctum", "same", "can:customer-access"]], function() {
    Route::get("/{rekening:no_rekening}", GetRekeningController::class);
    Route::post("/pengaduan/{rekening:no_rekening}", PostPengaduanController::class);
    Route::post("/jawab-survey/{rekening:no_rekening}", JawabSurveyController::class);
    Route::get("/survey/{survey:id}", GetSurveyByIdController::class);
    Route::get("/pengaduan/{rekening:no_rekening}", GetPengaduanController::class);
    Route::get("/tagihan/{rekening:no_rekening}", GetTagihanController::class);
    Route::put("/pengaduan/rate/{rekening:no_rekening}/{pengaduan:id}", GiveRateController::class);
    Route::post("/baca-meter/{rekening:no_rekening}", PostMeterController::class);
    Route::get("/baca-meter/{rekening:no_rekening}", GetBacaMeter::class);
});

Route::group(["prefix" => "pengumuman-survey", "middleware" => ["auth:sanctum", "can:customer-access"]], function() {
    Route::get("/pengumuman/{rekening:no_rekening}", GetPengumumanController::class);
    Route::get("/survey", GetAllSurveyController::class);
    Route::get("/survey/{survey:id}", GetSurveyByIdController::class);
});

Route::group(["prefix" => "pegawai", "middleware" => ["auth:sanctum", "can:reader-access"]], function() {
    Route::get("/pengaduan", PegawaiGetPengaduanController::class);
    Route::put("/pengaduan/proses/{pengaduan:id}", ProsesPengaduanController::class);
    Route::put("/pengaduan/selesai/{pengaduan:id}", PengaduanSelesaiController::class);
});


