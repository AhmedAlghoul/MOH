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
        Schema::create('nursecalcs', function (Blueprint $table) {
            $table->id();
            $table->string('hospital_name');
            $table->string('department');
            $table->integer('key_value');
            $table->integer('bed_count');
            $table->integer('nurse_count');
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
        Schema::dropIfExists('nursecalcs');
    }
};
