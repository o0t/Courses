<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('courses_id');
            $table->unsignedBiginteger('user_id');

            $table->string('name');
            $table->longText('description');
            // $table->longText('technologies')->nullable();
            $table->string('image_out')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('link1')->nullable();
            $table->string('link2')->nullable();
            $table->integer('likes')->default(0);
            $table->integer('views')->default(0);
            $table->enum('status', ['private','general'])->default('general');

            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::dropIfExists('projects');
    }
}
