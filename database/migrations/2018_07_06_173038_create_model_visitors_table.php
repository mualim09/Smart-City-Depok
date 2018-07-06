<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->increments('id_visitor');
            $table->string('ip');
            $table->string('os');
            $table->string('browser');
            $table->string('country_name');
            $table->string('country_code');
            $table->string('region_name');
            $table->string('region_code');
            $table->string('city_name');
            $table->string('zip_code');
            $table->string('iso_code');
            $table->string('postal_code');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('metro_code');
            $table->string('area_code');
            $table->string('driver');
            $table->string('blog');
            $table->string('event');
            $table->string('bounce_rate');
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
        Schema::dropIfExists('model_visitors');
    }
}
