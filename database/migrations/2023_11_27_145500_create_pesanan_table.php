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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan');
            $table->foreignId('paketwisata_id')->constrained('paketwisata');
            $table->foreignId('users_id')->constrained('users');
            $table->timestamp('tanggal_pesanan');
            $table->date('tanggal_kedatangan');
            $table->time('jam_kedatangan');
            $table->string('catatan')->nullable();
            $table->integer('jumlah_orang');
            $table->integer('total_harga');
            $table->enum('status', ['proses', 'lunas'])->default('proses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};

