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
        Schema::create('menu_caterings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');
            $table->string('kategori'); // Starter, Main Course, Dessert, Beverage, Paket Prasmanan, Snack Box
            $table->decimal('harga', 12, 2);
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->enum('status', ['Tersedia', 'Habis'])->default('Tersedia');
            $table->integer('minimal_porsi')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_caterings');
    }
};
