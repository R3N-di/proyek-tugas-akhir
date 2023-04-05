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
        Schema::create('absen', function (Blueprint $table) {
            //$table->id();
            $table->string('id',11)->unique();
            $table->string('idsiswa', 11);
            $table->string('idguru', 11);
            $table->foreign('idsiswa')->referances('id')->on('siswa')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('idguru')->referances('id')->on('guru')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('status',['hadir','alpha','izin']);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absen');
    }
};
