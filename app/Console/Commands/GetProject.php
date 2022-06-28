<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use App\Models\Manga;

class GetProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Project information from null rows';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // - get mangas.name=null
        //  - parse project_url and grab only project_id
        //  - go to: https://api.osemocphoto.com/frontAPI/getProjectInfo/${project_id}
        //  - save information to db
        
        foreach(Manga::where('project_id', null)->get() as $manga) {
            // cut only project_id
            $project_id = explode('/manga/', $manga['project_url']);
            // dd($project_id);
            if(count($project_id) != 2) {
                $manga->delete();
                continue;
            }

            $project_id = explode("/", $project_id[1])[0];

            $response = Http::get("https://api.osemocphoto.com/frontAPI/getProjectInfo/".$project_id);
            // dd($response->json());
            if(!$response->json()['projectInfo']) {
                $manga->delete();
                continue;
            }

            $manga->project_id = $response->json()['projectInfo']['projectId'];
            $manga->name = $response->json()['projectInfo']['projectName'];
            $manga->latest_chapter_id = $response->json()['listChapter'][0]['chapterId'];
            $manga->latest_chapter_no = $response->json()['listChapter'][0]['chapterNo'];
            $manga->image_version = $response->json()['projectInfo']['imageVersion'];
            $manga->is_new = 1;
            $manga->scraped_at = date('Y-m-d H:i:s');

            try {
                $manga->save();
            } catch(\Illuminate\Database\QueryException $err){ 

                if($err->getCode() == "23000") {
                    // duplicate project, deleted this.
                    $manga->delete();
                }
            }



        }
        
        return 0;
    }
}
