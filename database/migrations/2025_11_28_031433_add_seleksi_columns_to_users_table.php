<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'rata_rata')) {
                $table->decimal('rata_rata', 5, 2)->nullable()->after('nilai_smt5');
            }
            if (!Schema::hasColumn('users', 'poin_prestasi')) {
                $table->integer('poin_prestasi')->default(0)->after('rata_rata');
            }
            if (!Schema::hasColumn('users', 'nilai_total')) {
                $table->decimal('nilai_total', 5, 2)->default(0)->after('poin_prestasi');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['rata_rata', 'poin_prestasi', 'nilai_total']);
        });
    }
};