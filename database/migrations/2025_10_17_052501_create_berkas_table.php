<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('ijazah_skhun');  // Fotokopi Ijazah/SKHUN
            $table->string('akta_kelahiran'); // Fotokopi Akta Kelahiran
            $table->string('kk');             // Fotokopi KK
            $table->string('pas_foto');       // Pas foto 3x4
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berkas');
    }
};
