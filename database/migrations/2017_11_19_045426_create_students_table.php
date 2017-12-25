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
            $table->integer('roll_number');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('d_o_b')->nullable();
            $table->string('father_name');
            $table->string('phone_personal')->nullable();
            $table->string('phone_home')->nullable();
            $table->string('avatar')->nullable();
	        $table->string('village_name');
	        $table->string('upozilla_name');
	        $table->string('post_office');
	        $table->string('district');
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
