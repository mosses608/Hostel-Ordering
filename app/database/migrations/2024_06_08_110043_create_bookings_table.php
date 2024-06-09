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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('block_name');
            $table->string('room_number');
            $table->string('stay_from');
            $table->string('course');
            $table->string('level');
            $table->string('reg_number');
            $table->string('last_name');
            $table->string('gender');
            $table->string('contact_number');
            $table->string('emergency_contact');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
