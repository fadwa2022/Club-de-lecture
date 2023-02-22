<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivresController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [LivresController::class, 'index']);
Route::get('/home', [LivresController::class, 'index']);
Route::get('/dashboard', [LivresController::class, 'dashboard'])->name('dashboard');
Route::post('/createcategorie', [LivresController::class, 'store']);


Route::middleware('auth')->group(function () {
    Route::get('/profile/f', [ProfileController::class, 'favorites'])->name('profile.favorites');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','role:admin'])->group(function() {
 
    });
require __DIR__.'/auth.php';
