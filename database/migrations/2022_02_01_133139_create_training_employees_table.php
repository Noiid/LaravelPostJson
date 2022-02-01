<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_employees', function (Blueprint $table) {
            $table->increments('id_trainig_employees');
            $table->unsignedInteger('id_employees');
            $table->string('module_attended');
            $table->date('test_date');
            $table->double('training_hour');
            $table->integer('error');
            $table->string('status');
            $table->date('renewal_date');
            $table->timestamps();

            $table->foreign('id_employees')->references('id_employees')->on('employees')
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
        Schema::dropIfExists('training_employees');
    }
}
