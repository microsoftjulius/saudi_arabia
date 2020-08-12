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
        Schema::create('complaints',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('contract_id');
            $table->string('complaint');
            $table->string('evidence')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->enum('status',['active','deleted','pending'])->default('active');
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
        Schema::dropIfExists('complaints');
    }
}
