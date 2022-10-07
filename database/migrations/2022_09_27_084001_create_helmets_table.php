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
        Schema::create('helmets', function (Blueprint $table) {
            $table->id();
            $table->integer('carbon_doixide');
            $table->integer('carbon_monoxide');
            $table->integer('helmet_temperature');
            $table->integer('helmet_humidity');
            $table->integer('helmet_alert');
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
        Schema::dropIfExists('helmets');
    }
};
