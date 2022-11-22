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
        Schema::create('doctor_calcs', function (Blueprint $table) {
            $table->id();
            $table->integer('hospital_id');
            $table->integer('department_id');
            $table->integer('monthly_hours');
            $table->integer('doctor_count');
            $table->integer('doctor_result');
            $table->integer('doctor_need');
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
        Schema::dropIfExists('doctor_calcs');
    }
};
