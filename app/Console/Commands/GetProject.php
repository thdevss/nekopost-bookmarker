<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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
        return 0;
    }
}
