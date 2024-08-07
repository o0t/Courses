<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBiginteger('courses_id');
            $table->string('title')->unique();
            $table->string('url')->nullable();
            $table->string('content')->nullable();
            $table->string('file_name')->nullable();
            $table->string('description')->nullable();
            $table->enum('type', ['video','txt'])->nullable();
            $table->bigInteger('likes')->default(0);
            $table->bigInteger('comments')->default(0);
            $table->bigInteger('views')->default(0);
            $table->bigInteger('favorite')->default(0);
            $table->enum('allow_comments', ['yes','no'])->default('yes');
            $table->enum('status', ['waiting','private','general','customized','closed'])->default('private');
            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('serial')->nullable();



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
        Schema::dropIfExists('contents');
    }
}
