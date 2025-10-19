<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tas', function (Blueprint $table) {
            $table->foreignId('kategori_tas_id')
                  ->nullable()
                  ->constrained('kategori_tas')
                  ->after('merk'); 
        });
    }

    public function down(): void
    {
        Schema::table('tas', function (Blueprint $table) {
            $table->dropForeign(['kategori_tas_id']);
            $table->dropColumn('kategori_tas_id');
        });
    }
};