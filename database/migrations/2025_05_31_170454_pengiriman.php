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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('truk_id')->nullable()->constrained('truk')->cascadeOnDelete();
            $table->foreignId('gudang_id')->nullable()->constrained('gudang')->cascadeOnDelete();
            $table->string('resi');
            $table->string('penerima');
            $table->string('nohp_penerima');
            $table->string('nama_barang');
            $table->string('berat');
            $table->string('volume');
            $table->string('type');
            $table->string('harga');
            $table->date('tgl_pengiriman')->nullable();
            $table->string('status_pengiriman');
            $table->decimal('bobot_smart', 6, 3);
            $table->boolean('status_ulasan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};
