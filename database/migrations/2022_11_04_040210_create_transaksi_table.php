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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('id_transaksi', 10);
            $table->date('tgl_transaksi');
            $table->integer('total_bayar');
            $table->string('status');
            $table->string('metode_bayar');
            $table->unsignedInteger('id');
            $table->timestamps();
        });

        // Schema::table('transaksi', function (Blueprint $table) {
        //     $table->foreign('id_user')->references('id_user')->on('users');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
