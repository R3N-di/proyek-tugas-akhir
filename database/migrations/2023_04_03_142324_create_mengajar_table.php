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
        Schema::create('mengajar', function (Blueprint $table) {
           // $table->id();
           $table->string('idmengajar',11)->unique();
           $table->time('masuk');
           $table->time('selesai');
           $table->enum('hari',['sunday','monday','tuesday','wednesday','thursday','friday','saturday']);
           $table->string('idjurusan', 11);
           $table->string('idkelas', 11);
           $table->string('idguru', 11);
           $table->foreign('idjurusan')->references('jurusan')->on('jurusan')->cascadeOnUpdate()->cascadeOnDelete();
           $table->foreign('idkelas')->references('kelas')->on('kelas')->cascadeOnUpdate()->cascadeOnDelete();
           $table->foreign('idguru')->references('idguru')->on('guru')->cascadeOnUpdate()->cascadeOnDelete();
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mengajar');
    }
};
