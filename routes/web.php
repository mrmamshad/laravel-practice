<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Inertia\Inertia;
use App\Http\Controllers\JobController;


Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
Route::get('/jobs/create',[JobController::class, 'create'])->name('jobs.create');
Route::post('/jobs/create', [JobController::class, 'store'])->name('jobs.store');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
Route::patch('/jobs/{id}',[JobController::class, 'update'])->name('jobs.update');
Route::get('/jobs/{id}/edit',  [JobController::class, 'edit'])->name('jobs.edit');
Route::delete('/jobs/{id}/', [JobController::class, 'destroy'])->name('jobs.destroy');

// Route::resource('jobs', JobController::class);


Route::get('/contact', function () {
    return Inertia::render('contact');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
