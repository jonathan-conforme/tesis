<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('profesors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relación con la tabla users
           
            $table->string('tematica');
            $table->timestamps();
    
            // Definir la clave foránea con users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
};
