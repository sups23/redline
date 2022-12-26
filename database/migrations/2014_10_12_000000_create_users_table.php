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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->enum('blood_group', ['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-']);
            $table->string('contact');
            $table->string('age');
            $table->enum('gender', ['male', 'female']);
            $table->enum('donation_interval', ['3 months', '6 months', '1 year', 'irregular']);
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
