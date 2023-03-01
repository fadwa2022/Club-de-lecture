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
Route::post('/createcategorie', [AdminController::class, 'store'])->middleware(['auth','role:admin']);
Route::put('/categorie/{categorie}', [AdminController::class, 'update'])->middleware(['auth','role:admin']);
Route::delete('/categories/{categorie}', [AdminController::class, 'delete'])->middleware(['auth','role:admin']);
Route::post('/createbook', [AdminController::class, 'storebook'])->middleware(['auth','role:admin']);
Route::put('/book/{book}', [AdminController::class, 'updatebook'])->middleware(['auth','role:admin']);
Route::delete('/books/delete/{book}', [AdminController::class, 'deletebook'])->middleware(['auth','role:admin']);
Route::put('/books/archiver/{book}', [AdminController::class, 'archiverbook'])->middleware(['auth','role:admin']);
Route::put('/books/desarchiver/{book}', [AdminController::class, 'desarchiverbook'])->middleware(['auth','role:admin']);

Route::get('/livre/{livre}', [LivresController::class, 'livre']);
Route::get('/likes/{likes}', [LivresController::class, 'updatelike'])->middleware('auth');
Route::get('/dislikes/{dislikes}', [LivresController::class, 'updatedislike'])->middleware('auth');
Route::get('/note/{id}/{star}', [LivresController::class, 'stars'])->middleware('auth');
Route::get('/favorite/{livre}', [LivresController::class, 'favorite'])->middleware('auth');
Route::post('/createcommentl/{livre}', [LivresController::class, 'comment'])->middleware('auth');

Route::post('/creategroupe', [GroupeController::class, 'create'])->middleware('auth');
Route::delete('/groupe/delete/{groupe}', [GroupeController::class, 'delete'])->middleware('auth');
Route::post('/groupe/join/{groupe}', [GroupeController::class, 'join'])->middleware('auth');
Route::get('/groupe/{groupe}', [GroupeController::class, 'groupe']);
Route::post('/createcomment/{groupe}', [GroupeController::class, 'comment'])->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'favorites'])->name('profile.favorites');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','role:admin'])->group(function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    });
require __DIR__.'/auth.php';
