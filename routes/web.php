<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Manga;
use App\Http\Controllers\MangaController;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return to_route('user.manga');
});



Route::middleware(['auth:sanctum', 'verified'])->prefix('user')->name('user.')->group(function () {

    Route::get('/', function () {
        return to_route('user.manga');
    })->name('dashboard');

    Route::get('/manga', [MangaController::class, 'index'])->name('manga');
    Route::get('/manga/add', [MangaController::class, 'create'])->name('manga.add');
    Route::post('/manga', [MangaController::class, 'store'])->name('manga.store');
    Route::get('/manga/{manga}', [MangaController::class, 'show'])->name('manga.show');
    Route::delete('/manga/{manga}', [MangaController::class, 'destroy'])->name('manga.destroy');


    // other admin routes here
});
