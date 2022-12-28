<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'index'])->name('pages.index');
Route::get('/events', [PageController::class, 'events'])->name('pages.events');
Route::get('/donate', [PageController::class, 'donate'])->name('pages.donate');
Route::get('/why_donate', [PageController::class, 'why_donate'])->name('pages.why_donate');
Route::get('/donate_form', [PageController::class, 'donate_form'])->name('pages.donate_form');
Route::get('/about', [PageController::class, 'about'])->name('pages.about');
Route::get('/request_blood', [PageController::class, 'request_blood'])->name('pages.request_blood');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
