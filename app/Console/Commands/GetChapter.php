<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Manga;
class GetChapter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chapter:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get latest chapter from API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // - get latest data from: https://api.osemocphoto.com/frontAPI/getLatestChapter/m/0
        // - check every 5 minute
        // - check has projectId exist?
        // 	- if true, check noNewChapter > 1?
        // 		- if true, split chapterNo "," and get first element
        // 		- continue;
        // 	- check chapterId > db.chapterId
        // 	- if true, updated and notify it.

        return 0;
    }
}
