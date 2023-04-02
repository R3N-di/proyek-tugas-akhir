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
        Schema::create('table_siswa', function (Blueprint $table) {
            // $table->id('string', 11)->unique();
            $table->nis('integer', 8);
            $table->nama('string', 50);
            $table->password('string', 10);
            $table->jk('enum', ['L','P']);
            $table->gambar('string', 5);
            $table->dikelas('string', 11);
            $table->idjurusan('string', 11);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_siswa');
    }
};
