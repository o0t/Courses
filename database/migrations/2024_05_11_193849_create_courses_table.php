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
            $table->string('photo')->default('course.png');
            $table->longText('about_course')->nullable();
            $table->enum('status', ['waiting','private','general','customized','closed'])->default('private');
            $table->enum('level', ['beginner','intermediate','professional','all'])->nullable();
            $table->integer('count_Videos')->nullable();
            $table->integer('count_Time_Videos')->nullable();
            $table->longText('requirements')->nullable();
            $table->float('rating')->nullable();
            $table->enum('subscribers_status', ['paid','free'])->default('free');
            $table->integer('subscribers')->default(0);

            $table->enum('course_category', [
                'Literature',
                'History',
                'Philosophy',
                'Religion',
                'Visual/Performing Arts',
                'Business & Management',
                'Accounting',
                'Finance',
                'Marketing',
                'Entrepreneurship',
                'Operations Management',
                'Science & Technology',
                'Biology',
                'Computer Science',
                'Engineering',
                'Mathematics',
                'Physics',
                'Social Sciences',
                'Psychology',
                'Sociology',
                'Political Science',
                'Economics',
                'Anthropology',
                'Health & Medicine',
                'Nursing',
                'Public Health',
                'Nutrition',
                'Kinesiology',
                'Education & Human Development',
                'Teaching',
                'Counseling',
                'Early Childhood Education',
                'Environment & Sustainability',
                'Environmental Science',
                'Renewable Energy',
                'Conservation',
                'Language & Culture',
                'Foreign Languages',
                'Linguistics',
                'Cultural Studies'
            ])->nullable();

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
