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
        Schema::create('destinasi', function (Blueprint $table) {
            $table->increments('id_destinasi');
            $table->string('nama_des');
            $table->string('alamat');
            $table->string('status_des');
            $table->text('deskripsi');
            $table->unsignedInteger('id_kategori');
            $table->unsignedInteger('id');
            $table->timestamps();
        });

        // Schema::table('destinasi', function (Blueprint $table) {
        //     $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinasi');
    }
};
