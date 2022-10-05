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
            $table->
                /*
            *hospital_name
            **department
            ***employee_role
            ****needed_Cadre
            *****number o    عدد الموجود 
            ******الاحتياج
             */$table->timestamps();
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
