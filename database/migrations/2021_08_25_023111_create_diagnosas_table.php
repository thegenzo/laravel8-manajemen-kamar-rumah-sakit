<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosas', function (Blueprint $table) {
            $table->id();

            // relasi diagnosa dan pasien
            $table->unsignedBigInteger('id_pasien');
            $table->foreign('id_pasien')->references('id')->on('pasiens')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('diagnosa_akhir');
            $table->string('obat')->nullable();
            $table->enum('status_pasien', ['Sembuh', 'Rujukan', 'Meninggal']);
            $table->string('rs_rujukan')->nullable();
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
        Schema::dropIfExists('diagnosas');
    }
}
