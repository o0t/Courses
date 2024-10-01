<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBiginteger('courses_id');
            $table->unsignedBiginteger('user_id');

            $table->string('name');
            $table->longText('description')->nullable();
            $table->longText('article')->nullable();
            $table->string('image_out')->nullable();
            $table->integer('likes')->default(0);
            $table->integer('views')->default(0);

            $table->string('url')->unique();
            $table->enum('status', ['private','general'])->default('general');
            $table->string('token');

            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
