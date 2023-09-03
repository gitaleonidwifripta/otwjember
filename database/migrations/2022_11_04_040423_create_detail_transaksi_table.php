<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->increments('id_detailtransaksi');
            $table->string('jumlah_tiket');
            $table->unsignedInteger('id_destinasi');
            $table->string('id_transaksi');
            $table->unsignedInteger('id_tiket');
            $table->timestamps();
        });

        // Schema::table('detail_transaksi', function (Blueprint $table) {
        //     $table->foreign('id_destinasi')->references('id_destinasi')->on('destinasi');
        //     $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
