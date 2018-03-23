<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('registration_id')->nullable();
            $table->string('profession')->nullable();
            $table->string('student_type')->nullable();
            $table->string('designation')->nullable();
            $table->string('passed_division')->nullable();
            $table->string('passed_year')->nullable();
            $table->string('residential_status')->nullable();
	        $table->string('payment_type')->nullable();
	        $table->string('sender_no')->nullable();
            $table->timestamps();

             $table->foreign('student_id')
                    ->references('id')
                    ->on('students')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registration_details');
    }
}
