<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            // details
            $table->increments('id');
            $table->string('name',100);
            $table->text('title1')->nullable();
            $table->text('title2')->nullable();
            // contact
            $table->text('admin');
            $table->text('address');
            $table->text('city')->nullable();
            $table->string('email')->nullable();
            $table->integer('phonenumber')->nullable();
            $table->integer('mobilenumber')->nullable();

            $table->text('logo')->nullable();

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
        Schema::dropIfExists('schools');
    }
}
