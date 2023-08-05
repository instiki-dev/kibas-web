<?php

use App\Http\Controllers\Admin\Area\HapusAreaController;
use App\Http\Controllers\Admin\Area\SearchAreaController;
use App\Http\Controllers\Admin\Area\ShowTambahAreaController;
use App\Http\Controllers\Admin\Area\ShowUpdateAreaController;
use App\Http\Controllers\Admin\Area\TambahAreaController;
use App\Http\Controllers\Admin\Area\UpdateAreaController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\Auth\ShowLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Golongan\HapusGolonganController;
use App\Http\Controllers\Admin\Golongan\SearchGolonganController;
use App\Http\Controllers\Admin\Golongan\ShowTambahGolonganController;
use App\Http\Controllers\Admin\Golongan\ShowUpdateGolonganController;
use App\Http\Controllers\Admin\Golongan\TambahGolonganController;
use App\Http\Controllers\Admin\Golongan\UpdateGolonganController;
use App\Http\Controllers\Admin\GolonganController;
use App\Http\Controllers\Admin\Kecamatan\HapusKecamatanController;
use App\Http\Controllers\Admin\Kecamatan\SearchKecamatanController;
use App\Http\Controllers\Admin\Kecamatan\ShowTambahKecamatanController;
use App\Http\Controllers\Admin\Kecamatan\ShowUpdateKecamatanController;
use App\Http\Controllers\Admin\Kecamatan\TambahKecamatanController;
use App\Http\Controllers\Admin\Kecamatan\UpdateKecamatanController;
use App\Http\Controllers\Admin\KecamatanController;
use App\Http\Controllers\Admin\Kelurahan\HapusKelurahanController;
use App\Http\Controllers\Admin\Kelurahan\SearchKelurahanController;
use App\Http\Controllers\Admin\Kelurahan\ShowTambahKelurahanController;
use App\Http\Controllers\Admin\Kelurahan\ShowUpdateKelurahanController;
use App\Http\Controllers\Admin\Kelurahan\TambahKelurahanController;
use App\Http\Controllers\Admin\Kelurahan\UpdateKelurahanController;
use App\Http\Controllers\Admin\KelurahanController;
use App\Http\Controllers\Admin\MainDashboardController;
use App\Http\Controllers\Admin\Pegawai\HapusPegawaiController;
use App\Http\Controllers\Admin\Pegawai\SearchPegawaiController;
use App\Http\Controllers\Admin\Pegawai\ShowTambahPegawaiController;
use App\Http\Controllers\Admin\Pegawai\ShowUpdatePegawaiController;
use App\Http\Controllers\Admin\Pegawai\TambahPegawaiController;
use App\Http\Controllers\Admin\Pegawai\UpdatePegawaiController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\Pelanggan\DetailPelangganController;
use App\Http\Controllers\Admin\Pelanggan\HapusPelangganController;
use App\Http\Controllers\Admin\Pelanggan\SearchPelangganController;
use App\Http\Controllers\Admin\Pelanggan\ShowUpdatePelangganController;
use App\Http\Controllers\Admin\Pelanggan\TambahPelangganController;
use App\Http\Controllers\Admin\Pelanggan\TampilanController;
use App\Http\Controllers\Admin\Pelanggan\UpdatePelangganController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\Pengaduan\DetailPengaduanController;
use App\Http\Controllers\Admin\Pengaduan\KonfirmasiPengaduanController;
use App\Http\Controllers\Admin\Pengaduan\SearchPengaduanController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\Pengumuman\HapusPengumumanController;
use App\Http\Controllers\Admin\Pengumuman\TambahPengumumanController;
use App\Http\Controllers\Admin\Pengumuman\TambahPengumumanDBController;
use App\Http\Controllers\Admin\Profil\EditAdminController;
use App\Http\Controllers\Admin\Profil\TambahAdminController;
use App\Http\Controllers\Admin\Profil\TambahEntitasAdminController;
use App\Http\Controllers\Admin\Rekening\DetailRekeningController;
use App\Http\Controllers\Admin\Rekening\DetailTagihanController;
use App\Http\Controllers\Admin\Rekening\FilterTagihanController;
use App\Http\Controllers\Admin\Rekening\HapusRekeningController;
use App\Http\Controllers\Admin\Rekening\ImportTagihanController;
use App\Http\Controllers\Admin\Rekening\RekeningTagihanController;
use App\Http\Controllers\Admin\Rekening\SearchRekeningController;
use App\Http\Controllers\Admin\Rekening\ShowTambahRekeningController;
use App\Http\Controllers\Admin\Rekening\ShowUpdateRekeningController;
use App\Http\Controllers\Admin\Rekening\TambahRecordTagihanController;
use App\Http\Controllers\Admin\Rekening\TambahRekeningController;
use App\Http\Controllers\Admin\Rekening\TambahTagihanController;
use App\Http\Controllers\Admin\Rekening\UpdateRekeningController;
use App\Http\Controllers\Admin\RekeningController;
use App\Http\Controllers\Admin\RiwayatPengaduan\DetailRiwayatController;
use App\Http\Controllers\Admin\RiwayatPengaduan\FilterRiwayatControlller;
use App\Http\Controllers\Admin\RiwayatPengaduanController;
use App\Http\Controllers\Admin\Survey\DetailSurveyController;
use App\Http\Controllers\Admin\Survey\HapusSurveyDBController;
use App\Http\Controllers\Admin\Survey\TambahSurveyController;
use App\Http\Controllers\Admin\Survey\TambahSurveyDBController;
use App\Http\Controllers\Admin\TagihanController;
use App\Http\Controllers\Admin\User\SearchUserController;
use App\Http\Controllers\Admin\User\ShowUpdateUserController;
use App\Http\Controllers\Admin\User\UpdateUserController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ShowDashboardController;
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

Route::group(["prefix" => "admin"], function() {
    Route::get("/", ShowLoginController::class) -> name('root');
    Route::post("/", LoginController::class) -> name('login');
    Route::get("/logout", LogoutController::class) -> name('logout');

    Route::group(["prefix" => "dashboard", "middleware" => ["isadmin"]], function() {
        Route::get("/", MainDashboardController::class) -> name('dashboard');
        Route::group(["prefix" => "survey"], function() {
            Route::get("/", TambahSurveyController::class) ->name('show-tambah-survey');
            Route::post("/", TambahSurveyDBController::class) ->name('tambah-survey');
            Route::get("/hapus-survey/{survey:id}", HapusSurveyDBController::class) ->name('hapus-survey');
            Route::get("/detail-survey/{survey:id}", DetailSurveyController::class) ->name('detail-survey');
        });
    });

    Route::group(["prefix" => "profil", "middleware" => ["isadmin"]], function() {
        Route::get("/", DashboardController::class) -> name('profil');
        Route::get("/tambah-berita", TambahPengumumanController::class) -> name('tambah-berita');
        Route::post("/tambah-berita", TambahPengumumanDBController::class) ->name('post-tambah-berita');
        Route::get("/hapus-berita/{pengumuman:id}", HapusPengumumanController::class) ->name('hapus-berita');
        Route::put("/", EditAdminController::class) ->name('edit-admin');
        Route::get("/tambah-admin", TambahAdminController::class)->name('show-tambah-admin');
        Route::post("/tambah-admin", TambahEntitasAdminController::class)->name('tambah-admin');

    });

    Route::group(["prefix" => "pelanggan", "middleware" => ["isadmin"]], function() {
        Route::get("/", PelangganController::class) -> name('pelanggan');
        Route::get("/tambah-pelanggan", TampilanController::class) -> name('show-tambah-pelanggan');
        Route::get("/edit-pelanggan/{pelanggan:id}", ShowUpdatePelangganController::class)-> name('show-edit-pelanggan');
        Route::get("/hapus-pelanggan/{pelanggan:id}", HapusPelangganController::class)-> name('hapus-pelanggan');
        Route::get("/detail-pelanggan/{pelanggan:id}", DetailPelangganController::class)-> name('show-detail-pelanggan');
        Route::get("/cari-pelanggan", SearchPelangganController::class)-> name('search-pelanggan');
        Route::put("/edit-pelanggan/{pelanggan:id}", UpdatePelangganController::class)-> name('update-pelanggan');
        Route::post("/tambah-pelanggan", TambahPelangganController::class)-> name('tambah-pelanggan');
    });

    Route::group(["prefix" => "golongan", "middleware" => ["isadmin"]], function() {
        Route::get("/", GolonganController::class)-> name('golongan');
        Route::get("/hapus-golongan/{golongan:id}", HapusGolonganController::class)-> name('hapus-golongan');
        Route::get("/edit-golongan/{golongan:id}", ShowUpdateGolonganController::class)-> name('show-update-golongan');
        Route::put("/edit-golongan/{golongan:id}", UpdateGolonganController::class)-> name('update-golongan');
        Route::get("/cari-golongan", SearchGolonganController::class)-> name('search-golongan');
        Route::get("/tambah-golongan", ShowTambahGolonganController::class)-> name('show-tambah-golongan');
        Route::post("/tambah-golongan", TambahGolonganController::class)-> name('tambah-golongan');
    });

    Route::group(["prefix" => "kecamatan", "middleware" => ["isadmin"]], function() {
        Route::get("/", KecamatanController::class)-> name('kecamatan');
        Route::get("/tambah-kecamatan", ShowTambahKecamatanController::class)-> name('show-tambah-kecamatan');
        Route::get("/hapus-kecamatan/{kecamatan:id}", HapusKecamatanController::class)-> name('hapus-kecamatan');
        Route::get("/edit-kecamatan/{kecamatan:id}", ShowUpdateKecamatanController::class)-> name('show-edit-kecamatan');
        Route::put("/edit-kecamatan/{kecamatan:id}", UpdateKecamatanController::class)-> name('edit-kecamatan');
        Route::get("/cari-kecamatan", SearchKecamatanController::class)-> name('search-kecamatan');
        Route::post("/tambah-kecamatan", TambahKecamatanController::class)-> name('tambah-kecamatan');
    });

    Route::group(["prefix" => "kelurahan", "middleware" => ["isadmin"]], function() {
        Route::get("/", KelurahanController::class)-> name('kelurahan');
        Route::get("/tambah-kelurahan", ShowTambahKelurahanController::class)-> name('show-tambah-kelurahan');
        Route::get("/edit-kelurahan/{kelurahan:id}", ShowUpdateKelurahanController::class)-> name('show-update-kelurahan');
        Route::put("/edit-kelurahan/{kelurahan:id}", UpdateKelurahanController::class)-> name('update-kelurahan');
        Route::get("/cari-kelurahan", SearchKelurahanController::class)-> name('search-kelurahan');
        Route::post("/tambah-kelurahan", TambahKelurahanController::class)-> name('tambah-kelurahan');
        Route::get("/hapus-kelurahan/{kelurahan:id}", HapusKelurahanController::class)-> name('hapus-kelurahan');
    });

    Route::group(["prefix" => "area", "middleware" => ["isadmin"]], function() {
        Route::get("/", AreaController::class)-> name('area');
        Route::post("/tambah-area", TambahAreaController::class)-> name('tambah-area');
        Route::get("/tambah-area", ShowTambahAreaController::class)-> name('show-tambah-area');
        Route::get("/hapus-area/{area:id}", HapusAreaController::class)-> name('hapus-area');
        Route::get("/edit-area/{area:id}", ShowUpdateAreaController::class)-> name('show-edit-area');
        Route::get("/cari-area", SearchAreaController::class)-> name('search-area');
        Route::put("/edit-area/{area:id}", UpdateAreaController::class)-> name('edit-area');
    });

    Route::group(["prefix" => "pegawai", "middleware" => ["isadmin"]], function() {
        Route::get("/", PegawaiController::class)-> name('pegawai');
        Route::get("/tambah-pegawai", ShowTambahPegawaiController::class)-> name('show-tambah-pegawai');
        Route::get("/edit-pegawai/{pegawai:id}", ShowUpdatePegawaiController::class)-> name('show-update-pegawai');
        Route::put("/edit-pegawai/{pegawai:id}", UpdatePegawaiController::class)-> name('update-pegawai');
        Route::post("/tambah-pegawai", TambahPegawaiController::class)-> name('tambah-pegawai');
        Route::get("/hapus-pegawai/{pegawai:id}", HapusPegawaiController::class)-> name('hapus-pegawai');
        Route::get("/cari-pegawai", SearchPegawaiController::class)-> name('search-pegawai');
    });

    Route::group(["prefix" => "user", "middleware" => ["isadmin"]], function() {
        Route::get("/", UserController::class)-> name('user');
        Route::get("/ubah-password/{user:id}", ShowUpdateUserController::class)-> name('show-ubah-password');
        Route::put("/ubah-password/{user:id}", UpdateUserController::class)-> name('ubah-password');
        Route::get("/cari-user", SearchUserController::class)-> name('search-user');
    });

    Route::group(["prefix" => "rekening", "middleware" => ["isadmin"]], function() {
        Route::get("/", RekeningController::class)-> name('rekening');
        Route::get("/tambah-rekening", ShowTambahRekeningController::class)-> name('show-tambah-rekening');
        Route::get("/edit-rekening/{rekening:id}", ShowUpdateRekeningController::class)-> name('show-update-rekening');
        Route::get("/detail-rekening/{rekening:id}", DetailRekeningController::class)-> name('show-detail-rekening');
        Route::get("/cari-rekening", SearchRekeningController::class)-> name('cari-rekening');
        Route::get("/hapus-rekening/{rekening:id}", HapusRekeningController::class)-> name('hapus-rekening');
        Route::put("/edit-rekening/{rekening:id}", UpdateRekeningController::class)-> name('update-rekening');
        Route::post("/tambah-rekening", TambahRekeningController::class)-> name('tambah-rekening');
        Route::get("/riwayat-pengaduan/detail/{riwayat:id}", DetailRiwayatController::class)-> name('show-detail-riwayat');
        Route::get("/riwayat-pengaduan/{rekening:no_rekening}/filter-riwayat", FilterRiwayatControlller::class)-> name('filter-riwayat');
        Route::get("/riwayat-pengaduan/{rekening:id}", RiwayatPengaduanController::class)-> name('show-riwayat');
        Route::get("/tagihan/tambah-tagihan/{rekening:no_rekening}", TambahTagihanController::class)-> name('show-tambah-tagihan');
        Route::post("/tagihan/tambah-tagihan/{rekening:no_rekening}", TambahRecordTagihanController::class)-> name('tambah-tagihan');
        Route::get("/tagihan/{rekening:no_rekening}/filter-tagihan", FilterTagihanController::class)-> name('filter-tagihan');
        Route::get("/tagihan/detail/{tagihan:no_tagihan}", DetailTagihanController::class)-> name('show-detail-tagihan');
        Route::get("/tagihan/{rekening:no_rekening}", RekeningTagihanController::class)-> name('show-tagihan');
        Route::post("/tagihan/import", ImportTagihanController::class)-> name('import-tagihan');
    });

    Route::group(["prefix" => "pengaduan", "middleware" => ["isadmin"]], function() {
        Route::get("/", PengaduanController::class)-> name('pengaduan');
        Route::get("/detail-pengaduan/{pengaduan:id}", DetailPengaduanController::class)-> name('show-detail-pengaduan');
        Route::get("/cari-pengaduan", SearchPengaduanController::class)-> name('search-pengaduan');
        Route::put("/konfirmasi/{pengaduan:id}", KonfirmasiPengaduanController::class)-> name('konfirmasi-pengaduan');
    });
});

