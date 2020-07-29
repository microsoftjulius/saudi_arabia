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
        Schema::create('abroad_companies',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('contract');
            $table->string('location');
            $table->string('job_types');
            $table->string('visa_number');
            $table->string('visa_date');
            $table->string('signature');
            $table->integer('created_by');
            $table->enum('status',['active','pending','deleted'])->default('active');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('abroad_companies');
    }
}
