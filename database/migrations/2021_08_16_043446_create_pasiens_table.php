<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pasien')->unique();
            $table->string('nama_pasien');
            $table->integer('umur');
            $table->string('ttl');
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('jenis_pasien', ['JKN', 'Umum']);
            $table->enum('status_inap', [1, 0]);
            $table->string('nama_kepala_keluarga');
            $table->string('sumber_informasi');
            $table->text('keluhan_utama');
            $table->text('riwayat_keluhan_utama');
            $table->text('riwayat_penyakit')->nullable();
            $table->text('riwayat_alergi')->nullable();
            $table->string('diagnosa_masuk');

            // relasi kamar dan pasien
            $table->unsignedBigInteger('id_kamar');
            $table->foreign('id_kamar')->references('id')->on('kamars')->constrained()->onDelete('cascade')->onUpdate('cascade');

            // relasi dokter dan pasien
            $table->unsignedBigInteger('id_dokter');
            $table->foreign('id_dokter')->references('id')->on('dokters')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('gedung');

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
        Schema::dropIfExists('pasiens');
    }
}
