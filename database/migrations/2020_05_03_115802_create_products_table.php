<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->bigInteger('categories_id')->unsigned();
            $table->bigInteger('emas_id')->unsigned();
            $table->bigInteger('mahkota_id')->unsigned();
            $table->bigInteger('cabinet_id')->unsigned();
            $table->string('name');
            $table->string('weight');
            $table->bigInteger('nominal');
            $table->bigInteger('rfid');
            $table->string('gambar')->nullable();
            $table->string('status')->default('1');
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
        Schema::dropIfExists('products');
        
    }
}
