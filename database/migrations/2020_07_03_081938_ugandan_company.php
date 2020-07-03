<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UgandanCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UgandanCompany',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('UGCompany_id');
            $table->string('company_name');
            $table->string('license');
            $table->string('location');
            $table->string('contact');
            $table->string('email');
            $table->string('updated_by');
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
        Schema::dropIfExists('UgandanCompany');
    }
}