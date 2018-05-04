<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocmedAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socmed_analysis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_twitter');
            $table->string('nama_akun');
            $table->string('tweet');
            $table->string('sentiment');
            $table->string('score_positif');
            $table->string('score_netral');
            $table->string('score_negatif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socmed_analysis');
    }
}
