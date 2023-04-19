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
        Schema::create('users_about', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->comment('Berelasi ke table users');
            $table->text('skills')->nullable()->comment('Data skil yang dimiliki user, data berupa array of object');
            $table->text('biography')->nullable()->comment('Data tentang user, data berupa string deskripsi user');
            $table->text('testimonials')->nullable()->comment('Data tentang bukti keahlian, data berupa array of object');
            $table->integer('role_key')->comment('Pengambilan data dari table role, digunakan untuk hak akses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_about');
    }
};
