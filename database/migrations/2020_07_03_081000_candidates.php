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
        Schema::create('candidates', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('parent_id');
            $table->integer('employer_id');
            $table->integer('ug_company_id');
            $table->integer('abroad_company_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_name')->nullable();
            $table->string('duration')->nullable();
            $table->string('place_of_birth');
            $table->string('date_of_birth');
            $table->string('next_of_kin');
            $table->string('contact');
            $table->string('education_level');
            $table->string('occupation');
            $table->string('consent_letter');
            $table->integer('updated_by');
            $table->softDeletes('deleted_at',0);
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
        Schema::dropIfExists('candidates');
    }
}
