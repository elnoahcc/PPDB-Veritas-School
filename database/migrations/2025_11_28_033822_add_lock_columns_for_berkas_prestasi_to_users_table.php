<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('berkas_locked')->default(false)->after('identitas_submitted_at');
            $table->timestamp('berkas_submitted_at')->nullable()->after('berkas_locked');
            $table->boolean('prestasi_locked')->default(false)->after('berkas_submitted_at');
            $table->timestamp('prestasi_submitted_at')->nullable()->after('prestasi_locked');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['berkas_locked', 'berkas_submitted_at', 'prestasi_locked', 'prestasi_submitted_at']);
        });
    }
};