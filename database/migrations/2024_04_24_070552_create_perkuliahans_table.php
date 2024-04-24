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
        Schema::create('perkuliahan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_perkuliahan')->autoIncrement();
            $table->string('nim', length:10);
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->string('kode_mk', length:10);
            $table->foreign('kode_mk')->references('kode_mk')->on('mata_kuliah');
            $table->double('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkuliahans');
    }
};
