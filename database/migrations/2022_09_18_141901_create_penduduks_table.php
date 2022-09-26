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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 20);
            $table->string('nama', 150);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir', 150);
            $table->date('tgl_lahir');
            $table->enum('agama', ['Islam', 'Kristen', 'Khatolik', 'Hindu', 'Budha', 'Konghucu', 'Lainnya']);
            $table->enum('pendidikan', ['SD', 'SMP/Sederajat', 'SMA/Sederajat', 'D1/D2', 'D3', 'D4/S1', 'S2', 'S3']);
            $table->string('pekerjaan', 100);
            $table->enum('status', ['Belum Menikah', 'Menikah', 'Cerai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penduduks');
    }
};
