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
        Schema::table('users', function (Blueprint $table) {
            $table->string('telefono')->nullable()->after('email');
            $table->string('dni')->nullable()->after('telefono');
            $table->string('direccion')->nullable()->after('dni');
            $table->string('ciudad')->nullable()->after('direccion');
            $table->string('localidad')->nullable()->after('ciudad');
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['telefono', 'dni', 'direccion', 'ciudad', 'localidad']);
        });
    }
};
