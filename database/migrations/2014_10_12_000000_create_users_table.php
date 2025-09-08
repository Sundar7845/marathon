<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('photo_path');
            $table->string('poster_path');
            $table->string('user_type');
            $table->string('E-Number');
            $table->string('employee_name');
            $table->string('dob');
            $table->string('age');
            $table->string('gender');
            $table->string('unit');
            $table->string('department');
            $table->string('blood_group');
            $table->string('T-shirt_size');
            $table->string('category');
            $table->string('emergency_person');
            $table->string('emergency_person_number');
            $table->string('registration_type');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
