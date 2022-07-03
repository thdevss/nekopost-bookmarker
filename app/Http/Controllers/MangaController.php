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
        $mangas = Manga::where('user_id', Auth::id())->whereNotNull('project_id')->orderBy('scraped_at', 'desc')->paginate(4);
        return Inertia::render('Manga/AllManga', [
            'mangas' => $mangas
        ]);
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return Inertia::render('Manga/AddNewManga', []);
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
        $validated_data = $request->validate([
            'project_url' => ['required', 'url']
        ]);
        $validated_data['user_id'] = Auth::id();
        Manga::create($validated_data);
        // return to_route('user.manga.add');
        return redirect()->route('user.manga')->with('notification', [
            'color' => 'green',
            'title' => 'Added!',
            'message'=> 'added, please wait bot update 2-3 minute after'
        ]);
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
        // dd($manga);
        if($manga->user_id === Auth::id() && $manga->latest_chapter_no && $manga->project_id) {
            $manga->is_new = 0;
            $manga->save();

            return Inertia::location("https://www.nekopost.net/manga/{$manga->project_id}/{$manga->latest_chapter_no}");
        }

        return abort(403);
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
        $manga->delete();
        // return to_route('user.manga');
        return redirect()->back()->with('notification', [
            'color' => 'green',
            'title' => 'Deleted!',
            'message'=> 'this manga you choose was deleted.',
        ]);
    }
}
