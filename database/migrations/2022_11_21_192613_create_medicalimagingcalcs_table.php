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
        Schema::create('medicalimagingcalcs', function (Blueprint $table) {
            $table->id();
            $table->string('hospital_name');
            $table->string('department');
            $table->integer('ray_technician_count');
            $table->integer('x_rays')->nullable();
            $table->integer('Fluoroscopy')->nullable();
            $table->integer('mri')->nullable();
            $table->integer('ct_scan')->nullable();
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
        Schema::dropIfExists('medicalimagingcalcs');
    }
};
