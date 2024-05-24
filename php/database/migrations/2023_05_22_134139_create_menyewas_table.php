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
        Schema::create('menyewas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_lapangan');
            $table->unsignedBigInteger('id_user');
            $table->unsignedInteger('id_jadwal');
            $table->string('booking_code', 8)->unique();
            $table->string('status')->default('Belum Lunas');
            $table->foreign('id_lapangan')->references('id')->on('lapangans');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_jadwal')->references('id')->on('jadwals');
            $table->bigInteger('harga')->length(20);
            $table->date('tanggal');
            $table->timestamp('updated_at')->nullable();
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menyewas');
    }
};
