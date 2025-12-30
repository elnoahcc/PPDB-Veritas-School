<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('identitas_locked')->default(false)->after('status_seleksi');
            $table->timestamp('identitas_submitted_at')->nullable()->after('identitas_locked');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['identitas_locked', 'identitas_submitted_at']);
        });
    }
};