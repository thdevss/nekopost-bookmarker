<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;
    protected $fillable = ['project_url', 'user_id', 'name', 'project_id', 'latest_chapter_id', 'latest_chapter_no', 'image_version', 'is_new'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
