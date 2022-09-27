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
        Schema::create('detail_bantuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keluarga_id');
            $table->foreignId('bantuan_id');
            $table->date('tahap_1')->nullable();
            $table->date('tahap_2')->nullable();
            $table->timestamps();

            $table->foreign('keluarga_id')->references('id')->on('keluargas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bantuan_id')->references('id')->on('jenis_bantuans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_bantuans');
    }
};
