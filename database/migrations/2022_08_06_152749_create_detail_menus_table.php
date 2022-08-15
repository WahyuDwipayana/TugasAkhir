<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_menus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_menu')->unsigned();
            $table->bigInteger('id_reservasi')->unsigned();
            $table->bigInteger('jumlah_pesanan');
            $table->bigInteger('total_harga');
            $table->timestamps();
        });
        Schema::table('detail_menus', function (Blueprint $table){
            $table->foreign('id_menu')->references('id')->on('menu')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_reservasi')->references('id')->on('reservasis')->onDelete('cascade')->onUpdate('cascade');
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_menus');
    }
}
