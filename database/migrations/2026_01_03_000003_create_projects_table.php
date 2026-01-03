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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            // Project content
            $table->string('title');
            $table->text('description');
            $table->string('category'); // konstruksi-gedung, infrastruktur, renovasi

            // Image
            $table->string('image_url')->nullable();
            $table->string('image_alt')->nullable();

            // Status
            $table->boolean('is_published')->default(true);
            $table->dateTime('published_at')->nullable();

            // Timestamps
            $table->timestamps();

            // Indexes for better query performance
            $table->index('category');
            $table->index('is_published');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
