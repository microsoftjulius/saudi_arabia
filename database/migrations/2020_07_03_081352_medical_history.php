<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicalHistory extends Migration
{
    public function up()
    {
        Schema::create('MedicalHistory',function (Blueprint $table){
            $table->id();
            $table->string('premedical_status');
            $table->string('candidate_id');
            $table->string('premedical_status_date');
            $table->string('final_medical_test');
            $table->string('predepature_medical_tests');
            $table->string('covid19_certificate');
            $table->string('covid19_certificate_date');
            $table->integer('updated_by');
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
        Schema::dropIfExists('MedicalHistory');
    }
}