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
        Schema::create('guru', function (Blueprint $table) {
            $table->string('id', 11)->unique();
            $table->integer('nip', 18);
            $table->string('nama', 50);
            $table->string('password', 10);
            $table->enum('jk', ['L','P']);
            $table->string('gambar', 50);
            $table->foreign('idmapel')->references('id')->on('mapel')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
