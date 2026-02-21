<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BatchesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\RegimentController;
use App\Http\Controllers\SoldiersController;
use App\Http\Controllers\SoldiersDataController;
use App\Http\Controllers\VactionController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('regiment', RegimentController::class);
    Route::resource('batches', BatchesController::class);

    Route::post('/soldiers/delete-on-leave', [SoldiersController::class, 'deleteOnLeave'])
        ->name('soldiers.deleteOnLeave');

    Route::resource('soldiers', SoldiersController::class);

    Route::get('/regiments/{id}', [RegimentController::class, 'show'])
        ->name('regiments.show');

    Route::post('/soldiers.statue/{id}', [SoldiersController::class, 'statue'])
        ->name('soldiers.statue');

    Route::resource('soldiers-data', SoldiersDataController::class);

    Route::post('/soldiers-data/bulk-leave', [SoldiersDataController::class, 'bulkLeave'])
        ->name('soldiers-data.bulkLeave');

    Route::resource('leaves', LeavesController::class);
    Route::resource('vacation_permits', VactionController::class);

    Route::patch('/soldiers/update-status/{soldier}', [SoldiersController::class, 'updateStatus'])
        ->name('soldiers.updateStatus');
});