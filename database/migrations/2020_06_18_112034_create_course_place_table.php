<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursePlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_place', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id'); 
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            
            $table->unsignedBigInteger('place_id'); 
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade'); 

            $table->softDeletes();
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
        Schema::dropIfExists('course_place');
    }
}
