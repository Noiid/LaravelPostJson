<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_employees', function (Blueprint $table) {
            $table->increments('id_contact_employees');
            $table->unsignedInteger('id_employees');
            $table->string('phone');
            $table->string('email');
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
        Schema::dropIfExists('contact_employees');
    }
}
