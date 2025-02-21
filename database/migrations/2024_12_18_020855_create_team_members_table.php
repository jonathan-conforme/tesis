<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del miembro
            $table->string('role'); // Rol o título
            $table->string('team'); // Equipo al que pertenece
            $table->string('twitter')->nullable(); // URL de Twitter
            $table->string('linkedin')->nullable(); // URL de LinkedIn
           
            $table->string('image')->nullable(); // Imagen de perfil
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('team_members');
    }
}
