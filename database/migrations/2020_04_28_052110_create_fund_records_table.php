<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('fund_id')->unsigned();
            $table->date('date');
            $table->bigInteger('nominal');
            $table->timestamps();
            
            $table->foreign('fund_id')->references('id')->on('funds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fund_records');
    }
}
