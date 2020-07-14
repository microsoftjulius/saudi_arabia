<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employers extends Migration
{
    public function up()
    {
        Schema::create('Employers',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('employer_first_name');
            $table->string('employer_last_name');
            $table->string('employer_other_name')->nullable();
            $table->string('contact');
            $table->string('address');
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
        Schema::dropIfExists('Employers');
    }
}
