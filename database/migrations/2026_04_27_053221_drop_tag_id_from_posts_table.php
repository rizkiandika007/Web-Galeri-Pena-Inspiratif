<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Coba hapus foreign key jika ada
            $table->dropForeign(['tag_id']);
        });
        
        Schema::table('posts', function (Blueprint $table) {
            // Baru hapus kolomnya
            $table->dropColumn('tag_id');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('tag_id')->nullable();
        });
    }
};