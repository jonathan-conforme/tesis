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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('canton_name')->nullable();
            $table->date('date')->nullable();
            $table->string('youtube_video_1')->nullable();
            $table->string('youtube_video_2')->nullable();
            $table->string('page_title')->nullable(); // Nuevo campo
            $table->string('page_subtitle')->nullable(); // Nuevo campo
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['youtube_video_1', 'youtube_video_2']);
            $table->dropColumn(['page_title', 'page_subtitle']);
        });
            
    }
};
