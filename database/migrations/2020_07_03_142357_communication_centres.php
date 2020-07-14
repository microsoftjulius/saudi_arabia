<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommunicationCentres extends Migration
{/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CommunicationCentres',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('centre_name');
            $table->string('contact');
            $table->string('location');
            $table->integer('updated_by');
            $table->softdeletes('deleted at');
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
        Schema::dropIfExists('CommunicationCentres');
    }
}
