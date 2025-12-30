<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('periode_seleksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_periode');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('kuota')->default(100);
            $table->decimal('batas_lulus', 5, 2)->default(80);
            $table->enum('status', ['aktif', 'selesai', 'draft'])->default('draft');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        // Tambahkan kolom periode_id ke tabel seleksis
        Schema::table('seleksis', function (Blueprint $table) {
            $table->foreignId('periode_id')->nullable()->after('id')->constrained('periode_seleksi')->onDelete('cascade');
        });

        // Tambahkan kolom periode_id ke tabel users
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('periode_id')->nullable()->after('status_seleksi')->constrained('periode_seleksi')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('seleksis', function (Blueprint $table) {
            $table->dropForeign(['periode_id']);
            $table->dropColumn('periode_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['periode_id']);
            $table->dropColumn('periode_id');
        });

        Schema::dropIfExists('periode_seleksi');
    }
};