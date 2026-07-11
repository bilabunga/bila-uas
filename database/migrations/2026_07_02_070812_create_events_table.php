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
        Schema::create('events', function (Blueprint $table) {

            $table->id();

            // Judul event
            $table->string('title');

            // Tagline
            $table->string('tagline');

            // Deskripsi event
            $table->text('description');

            // Poster event
            $table->string('image')->nullable();

            // Tanggal event
            $table->date('date');

            // Lokasi
            $table->string('location');

            // Kuota peserta
            $table->integer('quota');

            // Kategori event
            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete();

            // Pembuat event
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};