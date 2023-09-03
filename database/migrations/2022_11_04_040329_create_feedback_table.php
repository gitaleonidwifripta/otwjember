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
        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('id_feedback');
            $table->unsignedInteger('id_destinasi');
            $table->unsignedInteger('id_user');
            $table->string('detail_feedback');
            $table->integer('rating');
            $table->timestamps();
        });

        // Schema::table('feedback', function (Blueprint $table) {
        //     $table->foreign('id_destinasi')->references('id_destinasi')->on('destinasi');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
};
