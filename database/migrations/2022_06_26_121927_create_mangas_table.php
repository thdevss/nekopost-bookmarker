<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mangas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('latest_chapter_id')->nullable();
            $table->string('latest_chapter_no')->nullable();
            $table->integer('image_version')->default(0);
            $table->string('project_url');
            $table->foreignId('user_id');
            $table->boolean('is_new')->default(0);
            $table->timestamps();
            $table->timestamp('scraped_at')->nullable();
        });

        Schema::table('mangas', function (Blueprint $table) {
            $table->unique(['project_id', 'user_id']);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mangas');
    }
};
