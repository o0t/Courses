<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_id');
            $table->string('title')->nullable();
            $table->string('name');
            $table->string('url');
            $table->longText('about_course')->nullable();
            $table->enum('status', [0,1])->default(0);
            $table->enum('level', ['beginner','intermediate','professional','all'])->nullable();
            $table->integer('count_Videos')->nullable();
            $table->integer('count_Time_Videos')->nullable();
            $table->longText('Requirements')->nullable();
            $table->float('rating')->nullable();
            $table->integer('subscribers')->default(0);
            $table->string('token');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('courses');
    }
}
