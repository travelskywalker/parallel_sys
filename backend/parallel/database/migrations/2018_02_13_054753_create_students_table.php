<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('studentnumber');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename');
            $table->string('gender');
            $table->date('birthdate');
            $table->string('birthplace')->nullable();
            $table->string('bloodtype')->nullable();
            $table->text('address');
            $table->string('fathersname');
            $table->string('mothersname');
            $table->string('guardianname');
            $table->string('guardianrelationship');
            $table->integer('emergencycontactnumber');
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->text('image')->nullable();
            // desc
            $table->text('notes')->nullable();
            $table->text('description')->nullable();
            
            // status
            $table->string('status')->default('active');
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
