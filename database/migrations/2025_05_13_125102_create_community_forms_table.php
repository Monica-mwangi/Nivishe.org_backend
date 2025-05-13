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
        Schema::create('community_forms', function (Blueprint $table) {
            $table->id();
            
            // Match EXACTLY with React form names
            $table->string('name'); // Frontend: name
            $table->string('email'); 
            $table->string('phone', 20); 
            $table->string('country', 100); 
            $table->text('education'); 
            $table->text('experience'); 
            $table->text('motivation'); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_forms');
    }
};
