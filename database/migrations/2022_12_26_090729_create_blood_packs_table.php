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
        Schema::create('blood_packs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');
            $table->date('arrived_at');
            $table->date('expiry_at');
            $table->enum('blood_type', ['WB', 'PRBC', 'SWRBC', 'SDPS', 'FFP', 'PC', 'SDP', 'PRB', 'CR', 'OTH']);
            $table->unsignedInteger('rbc_count');
            $table->unsignedInteger('wbc_count');
            $table->unsignedInteger('haemo_level');

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
        Schema::dropIfExists('blood_packs');
    }
};
