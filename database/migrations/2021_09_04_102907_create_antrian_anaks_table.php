<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntrianAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrian_anaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->integer('umur');
            $table->string('ttl');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('jenis_kelamin');
            $table->enum('jenis_pasien', ['JKN', 'Umum']);
            $table->string('nama_kepala_keluarga');
            $table->string('diagnosa_masuk');
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
        Schema::dropIfExists('antrian_anaks');
    }
}
