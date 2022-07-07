<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id');
            $table->string('name');
            $table->date('birthdate')->useCurrent()->nullable();
            $table->string('landline', 20)->nullable();
            $table->string('contact_no', 11);
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('occupation')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_contact_no', 11)->nullable();
            $table->string('relationship');
            $table->string('relationship_type');
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
        Schema::dropIfExists('families');
    }
}
