<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangLaboratoriumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_laboratorium', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 100)->nullable();
            $table->string('nama_barang', 100);
            $table->string('merek', 25)->nullable();
            $table->integer('jumlah');
            $table->string('satuan', 15);
            $table->string('asal_barang', 25)->nullable();
            $table->string('tahun_barang', 5)->nullable();
            $table->foreignId('laboratorium_id');
            $table->string('kondisi', 5);
            $table->string('ada_tidak', 5);
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
        Schema::dropIfExists('barang_laboratorium');
    }
}
