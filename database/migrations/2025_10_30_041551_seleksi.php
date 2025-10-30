<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seleksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('nilai_total')->default(0)->comment('Jumlah poin (prestasi + bobot nilai)');
            $table->enum('status', ['Lulus', 'Tidak Lulus', 'Dipertimbangkan'])->default('Dipertimbangkan');
            $table->text('catatan')->nullable();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->unique('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seleksis');
    }
};
