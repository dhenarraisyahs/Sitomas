<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_penjualans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('penjualan_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('nominal')->unsigned();
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
        Schema::dropIfExists('item_penjualans');
    }
}
