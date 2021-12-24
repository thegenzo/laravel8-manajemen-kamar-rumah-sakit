<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedisAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis_anaks', function (Blueprint $table) {
            $table->id();
            // relasi rekam medis dan pasien
            $table->unsignedBigInteger('id_pasien_anak');
            $table->foreign('id_pasien_anak')->references('id')->on('pasien_anaks')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('tensi_darah');
            $table->integer('suhu_tubuh');
            $table->integer('pernapasan');
            $table->integer('nadi');
            $table->string('anamnesis');
            $table->string('terapi');
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
        Schema::dropIfExists('rekam_medis_anaks');
    }
}
