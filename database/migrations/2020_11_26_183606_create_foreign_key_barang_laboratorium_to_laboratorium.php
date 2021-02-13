<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeyBarangLaboratoriumToLaboratorium extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang_laboratorium', function (Blueprint $table) {
            $table->foreign('laboratorium_id')->references('id')->on('laboratorium');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang_laboratorium', function (Blueprint $table) {
            $table->dropForeign('barang_laboratorium_laboratorium_id_foreign');
        });
    }
}
