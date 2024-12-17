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
        Schema::create('zona_parkir', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('peta_id');
            $table->string('nama_zona');
            $table->string('keterangan')->nullable();
            $table->json('koordinat');
            $table->timestamps();

            $table->foreign('peta_id')
                  ->references('id')
                  ->on('peta_parkir')
                  ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zona_parkir');
    }
};
