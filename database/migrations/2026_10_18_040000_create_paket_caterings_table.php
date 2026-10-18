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
        Schema::create('paket_caterings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->string('jenis_paket'); // Prasmanan, Nasi Box, Pernikahan, Tumpeng, Coffee Break
            $table->decimal('harga_paket', 12, 2);
            $table->integer('minimal_porsi')->default(10);
            $table->text('deskripsi')->nullable();
            $table->text('fasilitas')->nullable();
            $table->enum('status', ['Tersedia', 'Penuh / Pre-Order', 'Nonaktif'])->default('Tersedia');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_caterings');
    }
};
