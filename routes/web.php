<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ManageGuruController;
use App\Http\Controllers\ManageSiswaController;
use App\Http\Controllers\ManageKelasController;
use App\Http\Controllers\KelasKategoriController;
use App\Http\Controllers\TabeljController;
use App\Http\Controllers\JadwalKategoriController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\LandingController;

// HALAMAN UTAMA / LOGIN - hanya untuk guest (cek semua guard)
Route::middleware('guest.all')->group(function () {
	// landing
	Route::get('/', [LandingController::class, 'index'])->name('landing');

	// Admin login (form + submit)
	Route::get('/admin/login', [LandingController::class, 'showAdminLogin'])->name('login');
	Route::post('/admin/login', [AuthController::class, 'login'])->name('login.post');

	// User login (guru/siswa) (form + submit)
	Route::get('/login', [LandingController::class, 'showUserLogin'])->name('login.user');
	Route::post('/login', [AuthController::class, 'login'])->name('login.user.post');
});

// Logout (POST)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// SISWA
Route::middleware('auth:siswa')->prefix('dashboard/siswa')->name('siswa.')->group(function () {
	// ...existing siswa routes...
	Route::get('/', [SiswaController::class, 'index'])->name('dashboard');
	Route::get('/jadwal', [SiswaController::class, 'jadwal'])->name('jadwal');
	Route::get('/jadwal/cetak', [SiswaController::class, 'cetakJadwal'])->name('jadwal.cetak');
	Route::post('/profile/update', [SiswaController::class, 'updateProfilePicture'])->name('profile.update');
	Route::post('/switch-tahun-ajaran', [SiswaController::class, 'switchTahunAjaran'])->name('switch-tahun-ajaran');
	Route::get('/jadwal/arsip/{tahun_ajaran_id}', [SiswaController::class, 'getArsipJadwal'])->name('jadwal.arsip');
});

// GURU
Route::middleware('auth:guru')->prefix('dashboard/guru')->name('guru.')->group(function () {
	// ...existing guru routes...
	Route::get('/', [GuruController::class, 'index'])->name('dashboard');
	Route::get('/jadwal', [GuruController::class, 'jadwal'])->name('jadwal');
	Route::get('/jadwal/cetak', [GuruController::class, 'cetakJadwal'])->name('jadwal.cetak');
	Route::post('/profile/update', [GuruController::class, 'updateProfilePicture'])->name('profile.update');
	Route::post('/switch-tahun-ajaran', [GuruController::class, 'switchTahunAjaran'])->name('switch-tahun-ajaran');
	Route::get('/jadwal/arsip/{tahun_ajaran_id}', [GuruController::class, 'getArsipJadwal'])->name('jadwal.arsip');
});

// ADMIN (auth:web)
Route::middleware('auth:web')->group(function () {
	// Dashboard
	Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('admin.dashboard');

	// Jadwal CRUD + cetak (pastikan nama route 'admin.jadwal.cetak' ada)
	Route::get('/jadwal/pilih-kelas', [JadwalController::class, 'pilihKelas'])->name('jadwal.pilihKelas');
	Route::get('/jadwal/pilih-subkelas/{kategori}', [JadwalController::class, 'pilihSubKelas'])->name('jadwal.pilihSubKelas');
	Route::get('/jadwal/create/{kelas}', [JadwalController::class, 'create'])->name('jadwal.create');
	Route::post('/jadwal/store', [JadwalController::class, 'store'])->name('jadwal.store');
	Route::post('/jadwal/store-kategori', [JadwalController::class, 'storeKategori'])->name('jadwal.storeKategori');
	Route::get('/jadwal/kelas', [JadwalController::class, 'pilihKelasLihat'])->name('jadwal.pilihKelasLihat');
	Route::get('/jadwal/kelas/{kelas}', [JadwalController::class, 'jadwalPerKelas'])->name('jadwal.perKelas');
	Route::get('/jadwal/kelas/{kelas}/cetak', [JadwalController::class, 'cetakJadwal'])->name('admin.jadwal.cetak');
	Route::get('/jadwal/cetak-bulk', [JadwalController::class, 'cetakJadwalBulk'])->name('admin.jadwal.cetak.bulk');
	Route::post('/jadwal/bulk-store', [JadwalController::class, 'bulkStore'])->name('jadwal.bulkStore');
	Route::delete('/jadwal/{jadwal}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
	Route::delete('/jadwal/destroy-all/{kelas_id}', [JadwalController::class, 'destroyAll'])->name('jadwal.destroyAll');

	// ============================
    // MANAJEMEN TABEL JADWAL
    // ============================
    Route::prefix('manage/tabelj')->name('manage.tabelj.')->group(function () {
        Route::delete('/destroy-all', [TabeljController::class, 'destroyAll'])->name('destroyAll');
        Route::get('/assign-category', [TabeljController::class, 'assignCategory'])->name('assignCategory');
        Route::post('/assign-category', [TabeljController::class, 'storeAssignedCategory'])->name('storeAssignedCategory');
        Route::post('/{tabelj}/add-break', [TabeljController::class, 'addBreak'])->name('addBreak');
    });
    
    Route::resource('manage/tabelj', TabeljController::class)->except(['show'])->names([
        'index' => 'manage.tabelj.index',
        'create' => 'manage.tabelj.create',
        'store' => 'manage.tabelj.store',
        'edit' => 'manage.tabelj.edit',
        'update' => 'manage.tabelj.update',
        'destroy' => 'manage.tabelj.destroy',
    ]);

    // ============================
    // MANAJEMEN GURU
    // ============================
    Route::get('manage/guru/import', [ManageGuruController::class, 'showImportForm'])->name('manage.guru.import.show');
    Route::post('manage/guru/import', [ManageGuruController::class, 'import'])->name('manage.guru.import.store');
    Route::get('manage/guru/{guru}/availability', [ManageGuruController::class, 'editAvailability'])->name('manage.guru.availability.edit');
    Route::post('manage/guru/{guru}/availability', [ManageGuruController::class, 'updateAvailability'])->name('manage.guru.availability.update');
    Route::resource('manage/guru', ManageGuruController::class)->except(['show'])->names([
        'index' => 'manage.guru.index',
        'create' => 'manage.guru.create',
        'store' => 'manage.guru.store',
        'edit' => 'manage.guru.edit',
        'update' => 'manage.guru.update',
        'destroy' => 'manage.guru.destroy',
    ]);

    // ============================
    // MANAJEMEN SISWA
    // ============================
    // Rute spesifik HARUS di atas resource controller
    Route::prefix('manage/siswa')->name('manage.siswa.')->group(function () {
        Route::get('/export', [ManageSiswaController::class, 'export'])->name('export');
        Route::get('/import', [ManageSiswaController::class, 'showImportForm'])->name('import.form');
        Route::post('/import', [ManageSiswaController::class, 'import'])->name('import');
    });
    
    Route::resource('manage/siswa', ManageSiswaController::class)->except(['show'])->names([
        'index' => 'manage.siswa.index',
        'create' => 'manage.siswa.create',
        'store' => 'manage.siswa.store',
        'edit' => 'manage.siswa.edit',
        'update' => 'manage.siswa.update',
        'destroy' => 'manage.siswa.destroy',
    ]);

    // ============================
    // MANAJEMEN KELAS
    // ============================
    Route::resource('manage/kelas', ManageKelasController::class)->names([
        'index' => 'manage.kelas.index',
        'create' => 'manage.kelas.create',
        'store' => 'manage.kelas.store',
        'edit' => 'manage.kelas.edit',
        'update' => 'manage.kelas.update',
        'destroy' => 'manage.kelas.destroy',
        'show' => 'manage.kelas.show',
    ]);

    // ============================
    // JADWAL KATEGORI
    // ============================
    Route::resource('jadwal-kategori', JadwalKategoriController::class);

    // ============================
    // MANAJEMEN TAHUN AJARAN
    // ============================
    Route::prefix('manage/tahun-ajaran')->name('manage.tahun-ajaran.')->group(function () {
        Route::post('/{tahun_ajaran}/set-active', [TahunAjaranController::class, 'setActive'])->name('setActive');
        Route::get('/{tahun_ajaran}/switch-active', [TahunAjaranController::class, 'switchActive'])->name('switch');
    });
    
    Route::resource('manage/tahun-ajaran', TahunAjaranController::class)->names([
        'index' => 'manage.tahun-ajaran.index',
        'create' => 'manage.tahun-ajaran.create',
        'store' => 'manage.tahun-ajaran.store',
        'show' => 'manage.tahun-ajaran.show',
        'edit' => 'manage.tahun-ajaran.edit',
        'update' => 'manage.tahun-ajaran.update',
        'destroy' => 'manage.tahun-ajaran.destroy',
    ]);

    // ============================
    // KELAS KATEGORI
    // ============================
    Route::prefix('kelas')->name('kelas.')->group(function () {
        Route::get('/', [KelasKategoriController::class, 'index'])->name('kategori');
        Route::get('/{kategori}', [KelasKategoriController::class, 'show'])->name('show');
        Route::get('/{kategori}/{kelas}', [KelasKategoriController::class, 'detail'])->name('detail');
    });
});