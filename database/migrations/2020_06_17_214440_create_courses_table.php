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
            // Foregin Keys From Trainer , Comment , Category
            // Category
            $table->unsignedBigInteger('category_id'); 
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); 

            // Trainer
            $table->unsignedBigInteger('trainer_id'); 
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade');

            // Comment 
            // $table->unsignedBigInteger('comment_id');
            // $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');

              
            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');

            $table->string('name'); 
            $table->string('preview');
            $table->text('description'); 
            $table->integer('price'); 
            $table->string('image'); 
            $table->enum('booking' , ['avaliable' , 'completed'])->default('avaliable');  
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
        Schema::dropIfExists('courses');
    }
}
