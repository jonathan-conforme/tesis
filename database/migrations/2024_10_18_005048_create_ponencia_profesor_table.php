<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ponencia_profesor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ponencia_id');
            $table->unsignedBigInteger('profesor_id');
            $table->timestamps();

            // Relaciones
            $table->foreign('ponencia_id')
                  ->references('id')->on('ponencias')
                  ->onDelete('cascade');

            $table->foreign('profesor_id')
                  ->references('id')->on('profesors')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ponencia_profesor');
    }
};
