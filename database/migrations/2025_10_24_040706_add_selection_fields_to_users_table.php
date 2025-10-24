<?php
// database/migrations/2025_xx_xx_xxxxxx_add_selection_fields_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('berkas_approved')->default(false)->after('nilai_smt5');
            $table->boolean('prestasi_approved')->default(false)->after('berkas_approved');
            $table->string('prestasi_level', 20)->nullable()->after('prestasi_approved'); 
            // nilai: internasional, nasional, provinsi, kota, kabupaten, sekolah
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->after('prestasi_level');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['berkas_approved', 'prestasi_approved', 'prestasi_level', 'status']);
        });
    }
};