<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_values', function (Blueprint $table) {
            $table->id();

            $table->float('sell_moneda');
            $table->float('buy_moneda');
            
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('date_id');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('date_id')->references('id')->on('dates')->onDelete('cascade');
            
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_values');
    }
}
