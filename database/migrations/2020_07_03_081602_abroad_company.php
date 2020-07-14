<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AbroadCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AbroadCompany',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('contract');
            $table->string('location');
            $table->string('job_types');
            $table->string('visa_number');
            $table->string('visa_date');
            $table->string('signature');
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
        Schema::dropIfExists('AbroadCompany');
    }
}
