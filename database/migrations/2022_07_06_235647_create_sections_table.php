<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_name');
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('grade_level_id')->nullable();
            $table->foreign('grade_level_id')
                ->references('id')
                ->on('grade_levels')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->string('updated_by_user')->nullable();
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
        Schema::dropIfExists('sections');
    }
}
