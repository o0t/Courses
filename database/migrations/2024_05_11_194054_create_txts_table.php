<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTxtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('txts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('content_id');
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->integer('likes')->default(0);
            $table->integer('comments')->default(0);
            $table->integer('views')->default(0);
            $table->integer('favorite')->default(0);
            $table->enum('status', ['waiting','private','general','customized','closed'])->default('private');
            $table->enum('shearing_guests', ['general','private'])->default('private');
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
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
        Schema::dropIfExists('txts');
    }
}
