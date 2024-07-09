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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('total_hari');
            $table->string('status');
            for ($i = 1; $i < 18; $i++) {
                if ($i < 10) {
                    $table->string('_00' . $i);
                } else {
                    $table->string('_0' . $i);
                }
            }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
