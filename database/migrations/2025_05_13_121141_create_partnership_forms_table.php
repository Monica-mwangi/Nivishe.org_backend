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
        Schema::create('partnership_forms', function (Blueprint $table) {
            $table->id();
            $table->string('organization', 255);
            $table->string('contact_person', 255); // React: contactPerson
            $table->string('email', 255);
            $table->string('phone', 20);
            $table->string('website', 255)->nullable();
            $table->string('partnership_type', 255); // React: partnershipType
            $table->string('organization_type', 255); // React: organizationType
            $table->text('mission_alignment'); // React: missionAlignment
            $table->text('resources_offered'); // React: resourcesOffered
            $table->text('expectations');
            $table->text('previous_partnerships')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partnership_forms');
    }
};
