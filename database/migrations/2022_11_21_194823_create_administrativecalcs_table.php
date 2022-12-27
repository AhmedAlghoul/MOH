<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrativecalcs', function (Blueprint $table) {
            $table->id();
            $table->string('hospital_name');
            $table->string('department');
            $table->integer('administrative_count');
            $table->string('employee_role');
            $table->integer('seven_hours');
            $table->integer('twenty_four_hours');
            $table->integer('result');
            $table->integer('need');
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
        Schema::dropIfExists('administrativecalcs');
    }
};
