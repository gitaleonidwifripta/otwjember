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
        Schema::create('detail_user', function (Blueprint $table) {
            $table->increments('id_detailuser');
            $table->string('foto_profil');
            $table->string('alamat_user');
            $table->string('jenis_klm');
            $table->unsignedInteger('id');
            $table->timestamps();
        });

        // Schema::table('detail_user', function (Blueprint $table) {
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
        Schema::dropIfExists('detail_user');
    }
};
