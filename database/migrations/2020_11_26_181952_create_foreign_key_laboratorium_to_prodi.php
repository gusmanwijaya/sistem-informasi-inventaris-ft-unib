<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeyLaboratoriumToProdi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laboratorium', function (Blueprint $table) {
            $table->foreign('prodi_id')->references('id')->on('prodi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('laboratorium', function (Blueprint $table) {
            $table->dropForeign('laboratorium_prodi_id_foreign');
        });
    }
}
