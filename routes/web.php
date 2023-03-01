<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupeController;
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
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::post('/createcategorie', [AdminController::class, 'store']);
Route::put('/categorie/{categorie}', [AdminController::class, 'update']);
Route::delete('/categories/{categorie}', [AdminController::class, 'delete']);
Route::post('/createbook', [AdminController::class, 'storebook']);
Route::put('/book/{book}', [AdminController::class, 'updatebook']);
Route::delete('/books/delete/{book}', [AdminController::class, 'deletebook']);
Route::put('/books/archiver/{book}', [AdminController::class, 'archiverbook']);
Route::put('/books/desarchiver/{book}', [AdminController::class, 'desarchiverbook']);

Route::get('/livre/{livre}', [LivresController::class, 'livre']);
Route::get('/likes/{likes}', [LivresController::class, 'updatelike']);
Route::get('/dislikes/{dislikes}', [LivresController::class, 'updatedislike']);
Route::get('/note/{id}/{star}', [LivresController::class, 'stars']);
Route::get('/favorite/{livre}', [LivresController::class, 'favorite']);
Route::post('/createcommentl/{livre}', [LivresController::class, 'comment']);

Route::post('/creategroupe', [GroupeController::class, 'create']);
Route::delete('/groupe/delete/{groupe}', [GroupeController::class, 'delete']);
Route::post('/groupe/join/{groupe}', [GroupeController::class, 'join']);
Route::get('/groupe/{groupe}', [GroupeController::class, 'groupe']);
Route::post('/createcomment/{groupe}', [GroupeController::class, 'comment']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'favorites'])->name('profile.favorites');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','role:admin'])->group(function() {

    });
require __DIR__.'/auth.php';
