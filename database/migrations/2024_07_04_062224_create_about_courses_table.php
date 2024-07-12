<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('course_id');
            $table->longText('course_information')->nullable();
            $table->longText('recommended_course')->nullable();
            $table->longText('learn_course')->nullable();
            $table->longText('benefits_course')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::dropIfExists('about_courses');
    }
}
