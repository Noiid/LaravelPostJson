<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id_employees');
            $table->unsignedInteger('id_company');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('age');
            $table->string('gender');
            $table->string('department');
            $table->date('start_date_of_employment');
            $table->timestamps();

            $table->foreign('id_company')->references('id_company')->on('company')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
