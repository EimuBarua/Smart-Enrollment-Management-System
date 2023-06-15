<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offered__subjects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('session_id')->unsigned()->index();
            $table->bigInteger('course_id')->unsigned()->index();
     
            $table->foreign('session_id')->references('id')->on('user_sessions')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::dropIfExists('offered__subjects');
    }
};
