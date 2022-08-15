<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailReservasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_reservasis', function (Blueprint $table) {
            $table->id()->unsignedBigInteger();
            $table->bigInteger('id_reservasi')->unsigned();
            $table->bigInteger('id_meja')->unsigned();
            $table->bigInteger('id_hari')->unsigned();
            $table->bigInteger('id_jam')->unsigned();
            $table->timestamps();
        });
        Schema::table('detail_reservasis', function (Blueprint $table){
            $table->foreign('id_reservasi')->references('id')->on('reservasis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_meja')->references('id')->on('meja')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_hari')->references('id')->on('haris')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_jam')->references('id')->on('jams')->onDelete('cascade')->onUpdate('cascade');
        });     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_reservasis');
    }
}
