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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 20)->unique();
            $table->string('password');
            $table->enum('role', ['PENDAFTAR', 'ADMIN'])->default('PENDAFTAR');
            $table->string('no_hp', 15)->nullable();
            $table->rememberToken();

            // Data pendaftar
            $table->string('nisn_pendaftar', 20)->nullable();
            $table->string('nama_pendaftar', 50)->nullable();
            $table->date('tanggallahir_pendaftar')->nullable();
            $table->text('alamat_pendaftar')->nullable();
            $table->string('agama', 20)->nullable();
            $table->text('prestasi')->nullable();

            // Data orang tua
            $table->string('nama_ortu', 50)->nullable();
            $table->string('pekerjaan_ortu', 50)->nullable();
            $table->string('no_hp_ortu', 15)->nullable();
            $table->text('alamat_ortu')->nullable();

            // Nilai rapor
            $table->float('nilai_smt1')->nullable();
            $table->float('nilai_smt2')->nullable();
            $table->float('nilai_smt3')->nullable();
            $table->float('nilai_smt4')->nullable();
            $table->float('nilai_smt5')->nullable();

            // created_at & updated_at otomatis
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
