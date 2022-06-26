<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Manga;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::middleware(['auth:sanctum', 'verified'])->prefix('user')->name('user.')->group(function () {

    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/manga', function () {
        return Inertia::render('Manga/AllManga', [
            'mangas' => Manga::orderBy('updated_at', 'desc')->get()
        ]);
    })->name('manga');

    Route::get('/manga/add', function () {
        return Inertia::render('Manga/AddNewManga', []);
    })->name('manga.add');

    Route::post('/manga', function (Request $request) {
        
        //dd(Request::all());
        $validated_data = $request->validate([
            'project_url' => ['required', 'url']
        ]);
        //dd($validated_data);
        $validated_data['user_id'] = Auth::id();
        // dd($validated_data);
        Manga::create($validated_data);
        return to_route('manga');
    })->name('manga.store');

    // other admin routes here
});
