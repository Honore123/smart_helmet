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
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manager_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete(null);
            $table->integer('carbon_doixide')->default(0);
            $table->integer('carbon_monoxide')->default(0);
            $table->integer('helmet_temperature')->default(0);
            $table->integer('helmet_humidity')->default(0);
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
        Schema::dropIfExists('stations');
    }
};
