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
            $table->string('name')->nullable();
            $table->string('url');
            $table->string('photo')->default('course.png');
            $table->enum('status', ['waiting','private','general','customized','closed'])->default('private');
            $table->enum('level', ['beginner','intermediate','professional','all'])->default('all');
            $table->integer('count_videos')->default(0);
            $table->time('count_time_videos')->default('00:00:00');
            $table->integer('count_lessons')->default(0);
            $table->integer('count_tests')->default(0);
            $table->float('rating')->nullable();
            $table->enum('subscribers_status', ['paid','free'])->default('free');
            $table->integer('subscribers')->default(0);

            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);

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
