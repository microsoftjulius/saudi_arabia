<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Candidates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Candidates', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('candidate_id');
            $table->string('parent_id');
            $table->string('employer_id');
            $table->string('UGCompany_id');
            $table->string('abroadCompany_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_name')->nullable();
            $table->string('place_of_birth');
            $table->string('date_of_birth');
            $table->string('next_of_kin');
            $table->string('contact');
            $table->string('education_level');
            $table->string('occupation');
            $table->string('consent_letter');
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
        Schema::dropIfExists('Candidates');
    }
}
