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
        Schema::create('siswa', function (Blueprint $table) {
         $table->string('id', 11)->unique();
         $table->string('nis', 8);
         $table->string('nama', 50);
         $table->string('password', 10);
         $table->enum('jk', ['L','P']);
         $table->string('gambar', 5);
         $table->string('idkelas', 11);
         $table->string('idjurusan', 11);
         $table->foreign('idkelas')->references('kelas')->on('kelas')->cascadeOnUpdate()->cascadeOnDelete();
         $table->foreign('idjurusan')->references('jurusan')->on('jurusan')->cascadeOnUpdate()->cascadeOnUpdate();
         $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
