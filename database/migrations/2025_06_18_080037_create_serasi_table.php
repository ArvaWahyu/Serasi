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
        Schema::create('serasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('npm');
            $table->string('email');
            $table->string('telpon');
            $table->enum('kategori', ['akademik', 'non-akademik']);
            $table->text('deskripsi_laporan');
            $table->enum('status', ['tinjau', 'proses', 'tolak', 'selesai'])->default('tinjau');
            $table->text('pesan_balasan')->nullable();
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serasi');
    }
};
