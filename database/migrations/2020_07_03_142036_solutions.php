<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Solutions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Solutions',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('solution_name');
            $table->string('reg_code');
            $table->string('final_report_print_out');
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
        Schema::dropIfExists('Solutions');
    }
}
