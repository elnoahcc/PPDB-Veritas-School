<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admin', function (Blueprint $table) {
    $table->id('id_panitia');
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    $table->string('nama_panitia', 50);
    $table->string('no_hp', 20)->nullable();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
