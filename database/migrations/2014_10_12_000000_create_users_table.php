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
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('poster_path')->nullable();
            $table->string('user_type')->nullable();
            $table->string('E-Number')->nullable();
            $table->string('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('unit')->nullable();
            $table->string('department')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('T-shirt_size')->nullable();
            $table->string('category')->nullable();
            $table->string('emergency_person')->nullable();
            $table->string('emergency_person_number')->nullable();
            $table->string('registration_type')->nullable();
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
