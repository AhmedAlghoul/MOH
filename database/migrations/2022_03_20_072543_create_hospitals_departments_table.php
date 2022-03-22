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
        Schema::create('hospitals_departments', function (Blueprint $table) {
            $table->id();
            // $table->int('hospital_id');
            // $table->int('department_id');
            // $table->foreign('hospital_id')->references('id')->on('hospitals');
            // $table->foreign('department_id')->references('id')->on('departments');
            // $table->unique(['hospital_id', 'department_id']);
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
        Schema::dropIfExists('hospitals_departments');
    }
};
