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
        Schema::create('employees', function (Blueprint $table) {
            // $table->id(); // id()when i delete row it will deleted from database but the numbering will continue from the deleted row
            $table->id()->autoIncrement(true);
            $table->integer('job_number')->unique();
            $table->string('employee_name');
            // $table->date('date_of_hiring');
            $table->foreignId('hospital_id')->constrained('hospitals', 'id')->cascadeOnDelete();
            $table->foreignId('circle_id')->constrained('circles', 'id')->cascadeOnDelete();
            $table->foreignId('department_id')->constrained('departments', 'id')->cascadeOnDelete();
            $table->foreignId('role_id')->constrained('roles', 'id')->cascadeOnDelete();
            $table->string('mobile_number');
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
        Schema::dropIfExists('employees');
    }
};
