<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id');
            $table->integer('teachernumber')->nullable();
            $table->string('licensenumber')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename');
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
        Schema::dropIfExists('teachers');
    }
}
