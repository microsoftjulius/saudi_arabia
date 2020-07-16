<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Parents extends Migration
{
    public function up()
    {
        Schema::create('Parents',function (Blueprint $table){
            $table->id();
            $table->string('parent_first_name');
            $table->string('parent_last_name');
            $table->string('parent_other_name')->nullable();
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
        Schema::dropIfExists('Parents');
    }
}
