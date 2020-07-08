<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employers extends Migration
{
    public function up()
    {
        Schema::create('employers',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_name')->nullable();
            $table->string('contact');
            $table->string('address');
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
        Schema::dropIfExists('employers');
    }
}
