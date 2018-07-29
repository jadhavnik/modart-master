<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToStudent extends Migration
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
            $table->string('roll_no');
            $table->string('name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->integer('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('p_first_name')->nullable();
            $table->string('p_last_name')->nullable();
            $table->string('p_middle_name')->nullable();
            $table->integer('p_mobile')->nullable();
            $table->string('p_email')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('academic_yr')->nullable();
            $table->integer('batch_yr')->nullable();
            $table->integer('course_name')->nullable();
            $table->string('status')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
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
        Schema::table('students', function ($table) {
            $table->dropColumn('id');
            $table->dropColumn('paid');
            $table->dropColumn('roll_no');
            $table->dropColumn('name');
            $table->dropColumn('middle_name');
            $table->dropColumn('last_name');
            $table->dropColumn('dob');
            $table->dropColumn('mobile');
            $table->dropColumn('email');
            $table->dropColumn('address');
            $table->dropColumn('gender');
            $table->dropColumn('parent_name');
            $table->dropColumn('p_last_name');
            $table->dropColumn('p_middle_name');
            $table->dropColumn('p_mobile');
            $table->dropColumn('p_email');
            $table->dropColumn('academic_yr');
            $table->dropColumn('batch_yr');
            $table->dropColumn('course_name');
            $table->dropColumn('status');
            $table->dropColumn('username');
            $table->dropColumn('password');
        });
    }
}
