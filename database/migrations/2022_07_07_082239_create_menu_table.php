<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu', 100);
            $table->bigInteger('id_kategori')->unsigned();
            $table->double('harga_menu');
            $table->string('gambar_menu', 255);
            $table->text('desc_menu');
            $table->string('status', 50);
            $table->timestamps();
        });
        Schema::table('menu', function (Blueprint $table){
            $table->foreign('id_kategori')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
