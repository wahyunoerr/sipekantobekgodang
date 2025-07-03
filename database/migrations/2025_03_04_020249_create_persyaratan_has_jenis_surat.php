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
        Schema::create('persyaratan_has_jenis_surat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persyaratan_id');
            $table->unsignedBigInteger('jenis_surat_id');
            $table->foreign('persyaratan_id')->references('id')->on('persyaratans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenis_surat_id')->references('id')->on('jenis_surats')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persyaratan_has_jenis_surat');
    }
};
