<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('courses_id');
            $table->string('name')->nullable();
            $table->bigInteger('videos')->nullable();
            $table->bigInteger('txt')->nullable();
            $table->bigInteger('pdf')->nullable();
            $table->bigInteger('test')->nullable();
            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::dropIfExists('sections');
    }
}
