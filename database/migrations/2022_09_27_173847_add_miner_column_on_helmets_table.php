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
        Schema::table('helmets', function (Blueprint $table) {
            $table->foreignId('miner_id')->after('id')->references('id')->on('miners')->onUpdate('CASCADE')->onDelete(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('helmets', function (Blueprint $table) {
            $table->dropColumn('miner_id');
        });
    }
};
