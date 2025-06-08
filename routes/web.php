<?php

use App\Http\Controllers\Admin\AccountDisabledController;
use App\Http\Controllers\Admin\BidangKapabilitasController;
use App\Http\Controllers\Admin\BidangPraktikController;
use App\Http\Controllers\Admin\DaftarPenilaianController;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PenilaianController;
use App\Http\Controllers\Admin\PraktikController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RekapanPenilaianController;
use App\Http\Controllers\Admin\SecurityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Guest\GuestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['check.host', 'check.csp'])->group(function () {

    // Redirect Route
    Route::get('/', [GuestController::class, 'index'])->name('guest.index');

    // Account Disabled
    Route::prefix('account')->group(function () {
        Route::get('disabled', [AccountDisabledController::class, 'index'])->name('admin.account-disabled.index');
    });

    // Auth Route
    Auth::routes([
        'register' => false,
        'password.confirm' => false,
    ]);

    // Route Admin
    Route::prefix('admin')->middleware(['auth', 'check.role:super_admin|admin'])->group(function () {
        // Home
        Route::prefix('home')->group(function () {
            Route::get('/', [HomeController::class, 'index'])->name('admin.home.index');
            Route::prefix('rekapan/{id_daftar_penilaian}')->group(function () {
                Route::get('/', [RekapanPenilaianController::class, 'index'])->name('admin.home.rekapan.index');
                Route::get('detail', [RekapanPenilaianController::class, 'detail'])->name('admin.home.rekapan.detail');
                Route::get('print', [RekapanPenilaianController::class, 'print'])->name('admin.home.rekapan.print');
            });
        });

        // Daftar Penilaian
        Route::prefix('daftar-penilaian')->group(function () {
            Route::get('/', [DaftarPenilaianController::class, 'index'])->name('admin.daftar-penilaian.index');
            Route::post('store', [DaftarPenilaianController::class, 'store'])->name('admin.daftar-penilaian.store');
            Route::patch('update/{id}', [DaftarPenilaianController::class, 'update'])->name('admin.daftar-penilaian.update');
            Route::delete('delete/{id}', [DaftarPenilaianController::class, 'delete'])->name('admin.daftar-penilaian.delete');
            Route::patch('set-status/{id}', [DaftarPenilaianController::class, 'setStatus'])->name('admin.daftar-penilaian.set-status');

            // Penilaian
            Route::prefix('penilaian/{id_daftar_penilaian}')->group(function () {
                Route::get('/', [PenilaianController::class, 'index'])->name('admin.daftar-penilaian.penilaian.index');
                Route::post('/set-status-penilaian', [PenilaianController::class, 'setStatusPenilaian'])->name('admin.daftar-penilaian.penilaian.setStatusPenilaian');
                Route::post('/store-penilaian', [PenilaianController::class, 'storePenilaian'])->name('admin.daftar-penilaian.penilaian.storePenilaian');
                Route::post('/store-level-target', [PenilaianController::class, 'storeLevelTarget'])->name('admin.daftar-penilaian.penilaian.storeLevelTarget');
                Route::prefix('image-penilaian')->group(function () {
                    Route::post('/load', [PenilaianController::class, 'loadImagePenilaian'])->name('admin.daftar-penilaian.penilaian.loadImagePenilaian');
                    Route::post('/delete', [PenilaianController::class, 'deleteImagePenilaian'])->name('admin.daftar-penilaian.penilaian.deleteImagePenilaian');
                });
            });
        });

        // Master Data
        Route::prefix('master-data')->middleware(['check.role:super_admin'])->group(function () {

            // User Management
            Route::prefix('user')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('admin.master-data.user.index');
                Route::post('store', [UserController::class, 'store'])->name('admin.master-data.user.store');
                Route::patch('update/{id}', [UserController::class, 'update'])->name('admin.master-data.user.update');
                Route::delete('delete/{id}', [UserController::class, 'delete'])->name('admin.master-data.user.delete');
                Route::patch('set-status/{id}', [UserController::class, 'setStatus'])->name('admin.master-data.user.set-status');
            });

            // Domain
            Route::prefix('domain')->group(function () {
                Route::get('/', [DomainController::class, 'index'])->name('admin.master-data.domain.index');
                Route::post('store', [DomainController::class, 'store'])->name('admin.master-data.domain.store');
                Route::patch('update/{id}', [DomainController::class, 'update'])->name('admin.master-data.domain.update');
                Route::delete('delete/{id}', [DomainController::class, 'delete'])->name('admin.master-data.domain.delete');
                Route::patch('set-status/{id}', [DomainController::class, 'setStatus'])->name('admin.master-data.domain.set-status');

                // Bidang Kapabilitas
                Route::prefix('bidang-kapabilitas/{id_domain}')->group(function () {
                    Route::get('/', [BidangKapabilitasController::class, 'index'])->name('admin.master-data.domain.bidang-kapabilitas.index');
                    Route::post('store', [BidangKapabilitasController::class, 'store'])->name('admin.master-data.domain.bidang-kapabilitas.store');
                    Route::patch('update/{id}', [BidangKapabilitasController::class, 'update'])->name('admin.master-data.domain.bidang-kapabilitas.update');
                    Route::delete('delete/{id}', [BidangKapabilitasController::class, 'delete'])->name('admin.master-data.domain.bidang-kapabilitas.delete');
                    Route::patch('set-status/{id}', [BidangKapabilitasController::class, 'setStatus'])->name('admin.master-data.domain.bidang-kapabilitas.set-status');

                    // Bidang Praktik
                    Route::prefix('bidang-praktik/{id_bidang_kapabilitas}')->group(function () {
                        Route::get('/', [BidangPraktikController::class, 'index'])->name('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.index');
                        Route::post('store', [BidangPraktikController::class, 'store'])->name('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.store');
                        Route::patch('update/{id}', [BidangPraktikController::class, 'update'])->name('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.update');
                        Route::delete('delete/{id}', [BidangPraktikController::class, 'delete'])->name('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.delete');
                        Route::patch('set-status/{id}', [BidangPraktikController::class, 'setStatus'])->name('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.set-status');

                        // Praktik
                        Route::prefix('praktik/{id_bidang_praktik}')->group(function () {
                            Route::get('/', [PraktikController::class, 'index'])->name('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.praktik.index');
                            Route::post('store', [PraktikController::class, 'store'])->name('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.praktik.store');
                            Route::patch('update/{id}', [PraktikController::class, 'update'])->name('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.praktik.update');
                            Route::delete('delete/{id}', [PraktikController::class, 'delete'])->name('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.praktik.delete');
                            Route::patch('set-status/{id}', [PraktikController::class, 'setStatus'])->name('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.praktik.set-status');
                        });
                    });
                });
            });
        });

        // Setting
        Route::prefix('setting')->group(function () {

            // Profile Setting
            Route::prefix('profile')->group(function () {
                Route::get('/', [ProfileController::class, 'index'])->name('admin.setting.profile.index');
                Route::patch('/', [ProfileController::class, 'update'])->name('admin.setting.profile.update');
            });

            // Security Setting
            Route::prefix('security')->group(function () {
                Route::get('/', [SecurityController::class, 'index'])->name('admin.setting.security.index');
                Route::patch('/', [SecurityController::class, 'update'])->name('admin.setting.security.update');
            });
        });
    });
});
