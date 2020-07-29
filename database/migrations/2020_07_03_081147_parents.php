<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Parents extends Migration
{
    public function up()
    {
        Schema::create('parents',function (Blueprint $table){
            $table->id();
            $table->string('pfirst_name');
            $table->string('plast_name');
            $table->string('pother_name')->nullable();
            $table->string('pcontact');
            $table->string('paddress');
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
        Schema::dropIfExists('parents');
    }
}
