<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique();
            $table->string('student_lrn', 12)->unique()->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('ext_name')->nullable();
            $table->string('gender', 6);
            $table->integer('age');
            $table->string('email')->unique();
            $table->date('birthdate')->useCurrent();
            $table->string('birthplace');
            $table->string('address');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->foreign('section_id')
                ->references('id')
                ->on('sections')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('grade_level_id');
            $table->foreign('grade_level_id')
                ->references('id')
                ->on('grade_levels')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('sy_id');
            $table->foreign('sy_id')
                ->references('id')
                ->on('school_years')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->string('student_type');
            $table->boolean('status')->default(0);
            $table->boolean('isDone')->default(0)->nullable(); //isDone for old student na tapos an mag enroll
            $table->boolean('hasVerifiedEmail')->default(0);
            $table->boolean('hasPromissoryNote')->default(0);
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('students');
    }
}
