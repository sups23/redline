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
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->enum('blood_group', ['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-']);
            $table->string('contact');
            $table->string('address');
            $table->string('age');
            $table->enum('gender', ['male', 'female']);
            $table->enum('donation_interval', ['3 months', '6 months', '1 year', 'irregular']);
            $table->unsignedInteger('donation_count')->default(1);
            $table->date('last_donation_at');
            $table->text('description');

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
        Schema::dropIfExists('patient');
    }
};
