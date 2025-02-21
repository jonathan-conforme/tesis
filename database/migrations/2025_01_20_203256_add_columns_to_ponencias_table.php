<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ponencias', function (Blueprint $table) {
            $table->string('imagen_pago');
            $table->string('correo');
            $table->string('telefono');
            $table->string('universidad');
            $table->string('modo_participacion');
        });
    }

    public function down(): void
    {
        Schema::table('ponencias', function (Blueprint $table) {
            $table->dropColumn(['imagen_pago', 'correo', 'telefono', 'universidad', 'modo_participacion']);
        });
    }
};
