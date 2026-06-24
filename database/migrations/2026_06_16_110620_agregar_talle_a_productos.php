<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
    Schema::table('products', function (Blueprint $table) {
        $table->string('talles')->nullable()->after('stock');
    });
    }
    /**
     * Revierte las migraciones.
     */
   public function down(): void
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn('talles');
    });
}
};
