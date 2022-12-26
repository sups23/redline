<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->enum('blood_group', ['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-'])->nullable();
            $table->string('contact')->nullable();
            $table->string('age')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('donation_interval', ['3 months', '6 months', '1 year', 'irregular'])->nullable();
            $table->integer('donation_count')->nullable();
            $table->timestamp('last_donation_at')->nullable();
            $table->text('description')->nullable();

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
};
