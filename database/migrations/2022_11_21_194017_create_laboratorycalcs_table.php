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
        Schema::create('laboratorycalcs', function (Blueprint $table) {
            $table->id();
            $table->integer('hospital_id');
            $table->integer('department_id');
            $table->integer('laboratory_technicians_count');
            $table->integer('number_of_examinations');
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
        Schema::dropIfExists('laboratorycalcs');
    }
};
