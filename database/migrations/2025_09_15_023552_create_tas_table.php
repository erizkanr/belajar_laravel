<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('merk', 100)->nullable();
            $table->decimal('harga', 12, 2)->nullable();
            $table->string('foto', 255)->nullable(); // Pastikan tidak ada ->after() di sini
            $table->timestamps(); // Ini sudah mencakup created_at dan updated_at
        });
    }
    public function down(): void
    {
        Schema::table('tas', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};
