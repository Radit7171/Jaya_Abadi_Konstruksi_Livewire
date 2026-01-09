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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->nullable(); // IP pengunjung
            $table->string('user_agent')->nullable(); // Browser/Device info
            $table->string('page_url')->nullable(); // URL halaman yang dikunjungi
            $table->string('referrer')->nullable(); // Dari mana pengunjung datang
            $table->string('country')->nullable(); // Negara
            $table->string('city')->nullable(); // Kota
            $table->string('device_type')->nullable(); // desktop, mobile, tablet
            $table->string('browser')->nullable(); // Chrome, Firefox, Safari, etc
            $table->string('os')->nullable(); // Windows, MacOS, Android, iOS, etc
            $table->unsignedBigInteger('user_id')->nullable(); // Jika pengunjung adalah user terdaftar
            $table->timestamps(); // created_at dan updated_at

            // Indexes untuk performa query
            $table->index('ip_address');
            $table->index('created_at');
            $table->index('page_url');
            $table->index('device_type');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
