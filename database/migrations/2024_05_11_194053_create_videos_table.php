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
            $table->unsignedBiginteger('courses_id');
            $table->string('name');
            $table->longText('description');
            $table->integer('likes')->default(0);
            $table->integer('comments')->default(0);
            $table->integer('views')->default(0);
            $table->integer('favorite')->default(0);
            $table->enum('status', [0,1])->default(0);
            $table->enum('shearing_guests', [0,1])->default(0);
            $table->time('time')->default('00:00:00');
            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade');
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
