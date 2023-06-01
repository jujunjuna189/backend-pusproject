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
        Schema::create('posting', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->comment('Berelasi ke table users');
            $table->string('title')->comment('Untuk judul yang diupload');
            $table->double('price')->nullable()->comment('Untuk harga jika ada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posting');
    }
};
