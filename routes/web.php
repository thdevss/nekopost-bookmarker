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
        // return Inertia::render('Dashboard');
        return to_route('user.manga');
    })->name('dashboard');

    Route::get('/manga', function () {
        return Inertia::render('Manga/AllManga', [
            'mangas' => Manga::where('user_id', Auth::id())->whereNotNull('project_id')->orderBy('scraped_at', 'desc')->get()
        ]);
    })->name('manga');

    Route::get('/manga/add', function () {
        return Inertia::render('Manga/AddNewManga', []);
    })->name('manga.add');

    Route::post('/manga', function (Request $request) {
        $validated_data = $request->validate([
            'project_url' => ['required', 'url']
        ]);
        $validated_data['user_id'] = Auth::id();
        Manga::create($validated_data);
        return to_route('user.manga.add');
    })->name('manga.store');

    Route::get('/manga/go/{id}', function (Request $request, $id) {
        $manga = Manga::where('user_id', Auth::id())->where('id', $id)->first();
        if($manga->latest_chapter_no && $manga->project_id) {
            $manga->is_new = 0;
            $manga->save();
            return redirect("https://www.nekopost.net/manga/{$manga->project_id}/{$manga->latest_chapter_no}");
        }

        return abort(404);
    })->name('manga.go');

    // other admin routes here
});
