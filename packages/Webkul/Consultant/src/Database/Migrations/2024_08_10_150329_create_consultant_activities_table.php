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
        Schema::create('consultant_activities', function (Blueprint $table) {
            $table->integer('activity_id')->unsigned();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');

            $table->integer('consultant_id')->unsigned();
            $table->foreign('consultant_id')->references('id')->on('consultants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultant_activities');
    }
};
