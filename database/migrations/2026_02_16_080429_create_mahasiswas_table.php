<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->string('nim')->primary(); 
            $table->string('nama');
            $table->string('kelas');
            
            // Foreign Key merujuk ke tabel matakuliahs
            $table->unsignedBigInteger('matakuliah_id'); 
            $table->foreign('matakuliah_id')
                ->references('id')
                ->on('matakuliahs')
                ->onDelete('cascade');
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};