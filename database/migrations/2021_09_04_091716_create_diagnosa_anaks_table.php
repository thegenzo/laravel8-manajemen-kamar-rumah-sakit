<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosaAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosa_anaks', function (Blueprint $table) {
            $table->id();
            // relasi diagnosa dan pasien
            $table->unsignedBigInteger('id_pasien_anak');
            $table->foreign('id_pasien_anak')->references('id')->on('pasien_anaks')->constrained()->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('diagnosa_anaks');
    }
}
