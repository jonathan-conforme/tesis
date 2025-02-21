<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCronogramasTable extends Migration
{
    public function up()
    {
        Schema::create('cronogramas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('tema_exposicion');
            $table->string('lugar');
            $table->text('descripcion');
            $table->string('dia'); // Día en letras
            $table->integer('dia_numero'); // Día en número
            $table->string('mes'); // Mes
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('foto')->nullable(); // Foto (si se sube)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cronogramas');
    }
}
