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
        Schema::create('hasil_bimbingans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('id_pembimbing');
            $table->foreign('id_pembimbing')->references('id')->on('pembimbings')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('id_aspek');
            $table->date('tanggal');
            $table->string('status');
            $table->string('komentar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_bimbingans');
    }
};
