<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->time('timefrom');
            $table->time('timeto');
            $table->integer('studentlimit')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('classes_id');
            $table->integer('school_id');
            $table->string('room')->nullable();

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
        Schema::dropIfExists('sections');
    }
}
