<?php

use App\Http\Controllers\HelmetController;
use App\Http\Controllers\MinerController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SiteManagerController;
use App\Http\Controllers\StationController;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/', [MinerController::class, 'index'])->name('dashboard');
    
    Route::prefix('miner')->group(function () {
        Route::get('/add', [MinerController::class, 'add'])->name('add_miner');
        Route::get('/edit/{miner}', [MinerController::class, 'edit'])->name('miner.edit');
        Route::post('/store', [MinerController::class, 'store'])->name('miner.store');
        Route::put('/{miner}', [MinerController::class, 'update'])->name('miner.update');
        Route::delete('/{miner}', [MinerController::class, 'delete'])->name('miner.delete');
    });
    Route::prefix('report')->group(function() {
        Route::get('', [ReportController::class, 'index'])->name('report.index');
        Route::get('report/data', [ReportController::class, 'report'])->name('report.fetch');
    });
    Route::prefix('/site')->group(function () {
        Route::get('/', [StationController::class, 'index'])->name('site_data');
        Route::get('/managers', [SiteManagerController::class, 'index'])->name('site.managers');
        Route::get('.managers/add', [SiteManagerController::class,'add'])->name('site.manager.add');
        Route::get('/ajax/data/', [StationController::class, 'ajax'])->name('site.ajax');
        Route::post('/managers', [SiteManagerController::class, 'store'])->name('site.manager.store');
        Route::delete('/managers/{manager}', [SiteManagerController::class, 'destroy'])->name('site.manager.delete');
    });

    Route::prefix('notify')->group(function () {
        Route::get('send/alert/{notify}', [NotifyController::class, 'sendAlert'])->name('notify.send');
        Route::get('stop/alert/{notify}', [NotifyController::class, 'stopAlert'])->name('notify.stop');
    });

    Route::prefix('helmet')->group(function () {
        Route::get('/{miner}', [HelmetController::class, 'index'])->name('miner_data');
        Route::get('/ajax/data/{miner}',[HelmetController::class, 'ajax'])->name('miner.ajax');
    });
    
    Route::get('/change_password', function () {
        return view('change_password');
    })->name('change_password');
});

Route::get('/miner_data/{carbon_dioxide}/{carbon_monoxide}/{temperature}/{humidity}/{alert}/{miner}', [HelmetController::class, 'deviceData']);
Route::get('/site_data/{carbon_dioxide}/{carbon_monoxide}/{temperature}/{humidity}/{manager}', [StationController::class, 'deviceData']);
Route::get('/notify', [NotifyController::class, 'index']);



require __DIR__.'/auth.php';
