<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_modules', function (Blueprint $table) {
            $table->increments('id_training_module');
            $table->unsignedInteger('id_company');
            $table->string('module_name');
            $table->integer('average_training_hour');
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
        Schema::dropIfExists('training_modules');
    }
}
