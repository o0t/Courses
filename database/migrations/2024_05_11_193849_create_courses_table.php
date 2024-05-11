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
            $table->string('title');
            $table->longText('about_course');
            $table->enum('status', [0,1])->default(0);
            $table->enum('level', ['Professional','Intermediate','Beginner'])->default('Beginner');
            $table->integer('count_Videos');
            $table->integer('count_Time_Videos');
            $table->longText('Requirements');
            $table->float('rating');
            $table->integer('subscribers')->default(0);

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
