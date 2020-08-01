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
            $table->string('efirst_name');
            $table->string('elast_name');
            $table->string('eother_name')->nullable();
            $table->string('contact');
            $table->string('address');
            $table->string('photo');
            $table->string('created_by');
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
        Schema::dropIfExists('employers');
    }
}
