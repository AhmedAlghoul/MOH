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
            $table->integer('hospital_id');
            $table->integer('department_id');
            $table->integer('administrative_count');
            $table->integer('employee_role');
            $table->integer('need');
            $table->integer('result');
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
