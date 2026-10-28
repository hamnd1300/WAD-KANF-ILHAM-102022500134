<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('whatsapp', 20);
            $table->string('layanan', 50);
            $table->integer('berat');
        });
    }
    public function down() {
        Schema::dropIfExists('pesanan');
    }
};