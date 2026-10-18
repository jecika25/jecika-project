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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan')->unique();
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->string('nama_menu');
            $table->string('nama_pemesan');
            $table->string('email')->nullable();
            $table->string('no_hp');
            $table->text('alamat')->nullable();
            $table->integer('jumlah_porsi');
            $table->decimal('total_harga', 14, 2);
            $table->date('tanggal_acara')->nullable();
            $table->string('jenis_acara')->nullable();
            $table->text('catatan')->nullable();
            $table->enum('status', ['Pending', 'Dikonfirmasi', 'Diproses', 'Selesai', 'Dibatalkan'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
