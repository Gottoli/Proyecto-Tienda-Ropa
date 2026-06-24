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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('nombre_completo')->nullable()->after('estado');
            $table->string('dni', 20)->nullable()->after('nombre_completo');
            $table->string('direccion')->nullable()->after('dni');
            $table->string('ciudad')->nullable()->after('direccion');
            $table->string('localidad')->nullable()->after('ciudad');
            $table->string('metodo_pago')->nullable()->after('localidad');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['nombre_completo','dni','direccion','ciudad','localidad','metodo_pago']);
        });
    }
};
