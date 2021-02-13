<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeyBarangDekanatToDekanat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang_dekanat', function (Blueprint $table) {
            $table->foreign('ruangan_id')->references('id')->on('dekanat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang_dekanat', function (Blueprint $table) {
            $table->dropForeign('barang_dekanat_ruangan_id_foreign');
        });
    }
}
