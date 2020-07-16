<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Complaints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Complaints',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('complaint_type');
            $table->string('complaint_details');
            $table->string('reported_date');
            $table->string('resolved_date');
            $table->string('reported_time');
            $table->string('complaint_status');
            $table->string('evidence');
            $table->integer('updated_by')->nullable();
            $table->integer('created_by');
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
        Schema::dropIfExists('Complaints');
    }
}
