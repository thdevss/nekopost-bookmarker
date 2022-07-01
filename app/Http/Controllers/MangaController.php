<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use \Auth;

class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mangas = Manga::where('user_id', Auth::id())->whereNotNull('project_id')->orderBy('scraped_at', 'desc')->paginate(5);
        // dd($mangas);
        return Inertia::render('Manga/AllManga', [
            'mangas' => $mangas
        ]);
    }

    public function to_reader(Request $request, $id)
    {
        $manga = Manga::where('user_id', Auth::id())->whereNotNull('project_id')->where('id', $id)->first();
        if($manga->latest_chapter_no && $manga->project_id) {
            $manga->is_new = 0;
            $manga->save();
            return redirect("https://www.nekopost.net/manga/{$manga->project_id}/{$manga->latest_chapter_no}");
        }

        return abort(404);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $validated_data = $request->validate([
            'project_url' => ['required', 'url']
        ]);
        $validated_data['user_id'] = Auth::id();
        Manga::create($validated_data);
        return to_route('user.manga.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function show(Manga $manga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function edit(Manga $manga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manga $manga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manga $manga)
    {
        //
    }
}
