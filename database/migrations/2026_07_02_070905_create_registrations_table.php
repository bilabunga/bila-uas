<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {

            $table->id();

            // User yang mendaftar
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Event yang didaftarkan
            $table->foreignId('event_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Data peserta
            $table->string('name');
            $table->string('email');
            $table->string('phone');

            // Status pendaftaran
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])
                  ->default('Pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};