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
        Schema::table('absen', function (Blueprint $table) {
            $table->string('idmengajar', 11)->after('tanggal');
            $table->foreign('idmengajar')->references('idmengajar')->on('mengajar')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('keterangan')->after('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absen', function (Blueprint $table) {
            $table->dropColumn('idmengajar');
            $table->dropColumn('keterangan');
        });
    }
};
