<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicalHistory extends Migration
{
    public function up()
    {
        Schema::create('MedicalHistory',function (Blueprint $table){
            $table->string('medic_id');
            $table->string('first_name');
            $table->string('premedical_status');
            $table->string('premedical_status_date');
            $table->string('final_medical_test');
            $table->string('predepature_medical_tests');
            $table->string('covid19_certificate');
            $table->string('covid19_certificate_date');
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
        Schema::dropIfExists('MedicalHistory');
    }
}