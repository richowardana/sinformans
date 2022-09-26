<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keluarga_id');
            $table->foreignId('penduduk_id')->unique();
            $table->enum('jabatan', ['Kepala Keluarga', 'Istri', 'Anak Kandung', 'Anak Angkat', 'Nenek', 'Kakek', 'Keponakan']);
            $table->timestamps();
            $table->foreign('keluarga_id')->references('id')->on('keluargas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('penduduk_id')->references('id')->on('penduduks')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_keluargas');
    }
};
