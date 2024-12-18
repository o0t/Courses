<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_sections', function (Blueprint $table) {
            $table->id();

            $table->unsignedBiginteger('content_id');
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->longText('content')->nullable();
            $table->string('file_name')->nullable();
            $table->longText('description')->nullable();
            $table->enum('type', ['video','txt','file'])->nullable();
            $table->bigInteger('likes')->default(0);
            $table->bigInteger('comments')->default(0);
            $table->bigInteger('views')->default(0);
            $table->bigInteger('favorite')->default(0);
            $table->enum('allow_comments', ['yes','no'])->default('yes');
            $table->enum('status', ['waiting','private','general','customized','closed'])->default('private');
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
            $table->unsignedBigInteger('serial')->nullable();
            $table->string('token');
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
        Schema::dropIfExists('content_sections');
    }
}
