<?php

use App\Http\Controllers\DashBoardController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HostController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitorController;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [VisitController::class, 'create'])->name('dashboard')->middleware(['auth', 'verified']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Visitor


});


Route::resource('visitors', VisitorController::class)->middleware('auth');


Route::resource('hosts', HostController::class)->middleware('auth');

Route::post('hosts', [HostController::class, 'store'])->name('hosts.store');

Route::patch('/visits/checkout/{visit}', [VisitController::class, 'checkout'])->name('visits.checkout')->middleware('auth');




Route::resource('visits',VisitController::class)->middleware('auth');

require __DIR__.'/auth.php';
