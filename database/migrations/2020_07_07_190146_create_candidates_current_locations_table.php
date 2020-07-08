<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesCurrentLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ['candidate_id','longitude','latitude']
        Schema::create('candidates_current_locations', function (Blueprint $table) {
            $table->id();
            $table->integer('candidate_id');
            $table->polygon('longitude');
            $table->polygon('latitude');
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
        Schema::dropIfExists('candidates_current_locations');
    }
}
