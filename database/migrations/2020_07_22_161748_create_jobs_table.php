<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_name');
            $table->string('company_name');  
            $table->string('preview');
            $table->text('requirments');
            $table->string('image'); 
            $table->string('salary');
            $table->string('experience'); 
            $table->string('work_hours');
            $table->string('location'); 
            $table->text('who_are')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
