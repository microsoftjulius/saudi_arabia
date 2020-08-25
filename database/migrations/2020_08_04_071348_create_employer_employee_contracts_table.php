<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerEmployeeContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_employee_contracts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employer_id');
            $table->bigInteger('employee_id');
            $table->enum('contract_status',['active','finished','terminated'])->default('active');
            $table->string('contract_file');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('employer_employee_contracts');
    }
}
