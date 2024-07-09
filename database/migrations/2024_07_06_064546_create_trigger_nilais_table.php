<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER trigger_nilai AFTER INSERT ON mahasiswas FOR EACH ROW
                BEGIN
                    INSERT INTO nilais (id_mahasiswa, status, total_hari, _001, _002, _003, _004, _005, _006, _007, _008, _009, _010, _011, _012, _013, _014, _015, _016, _017, created_at, updated_at) VALUES (new.id, "aktif", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, new.created_at, new.updated_at);
                END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
