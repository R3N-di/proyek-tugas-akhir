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
            $table->string('id',11)->unique();
            $table->time('masuk');
            $table->time('selesai');
            $table->enum('hari',['sunday','monday','tuesday','wednesday','thursday','friday','saturday']);
            $table->foreign('idjurusan')->referances('id')->on('jurusan')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('idkelas')->referances('id')->on('kelas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('idguru')->referances('id')->on('guru')->cascadeOnUpdate()->cascadeOnDelete();
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
