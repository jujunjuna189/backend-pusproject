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
        Schema::create('posting_file', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('posting_id')->comment('Berelasi ke table posting');
            $table->text('file')->comment('Link file yang di posting, file => (Image, Short Video)');
            $table->text('style')->default('{}')->comment('Style untuk file yang di posting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posting_file');
    }
};
