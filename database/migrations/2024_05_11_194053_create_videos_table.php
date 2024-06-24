<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('content_id');
            $table->string('video_name');
            $table->string('file_name');
            $table->string('url_video');
            $table->longText('description')->nullable();
            $table->integer('likes')->default(0);
            $table->integer('comments')->default(0);
            $table->integer('views')->default(0);
            $table->integer('favorite')->default(0);
            $table->enum('status', ['waiting','private','general','customized','closed'])->default('private');
            $table->enum('shearing_guests', ['general','private'])->default('private');
            $table->enum('allow_comments', ['allow','disallow'])->default('disallow');
            $table->time('time')->default('00:00:00');
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
