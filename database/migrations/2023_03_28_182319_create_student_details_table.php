<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('student_id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('course_id');
            $table->string('batch');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('father_occupation')->nullable();
            $table->string('permanent_address');
            $table->string('p_state');
            $table->string('p_pin_code');
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('mobile');
            $table->string('email');
            $table->string('correspondence_address')->nullable();
            $table->string('c_state')->nullable();
            $table->string('c_pin_code')->nullable();
            $table->date('date_of_birth');
            $table->string('nationality');
            $table->string('sex');
            $table->string('physical_challenges')->nullable();
            $table->string('national_id_card_no');
            $table->string('lg_name')->nullable();
            $table->string('lg_address')->nullable();
            $table->string('lg_mobile')->nullable();
            $table->string('lg_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_details');
    }
};
