<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDateValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_value', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('year_id');
            $table->unsignedBigInteger('month_id');
            $table->unsignedBigInteger('day_id');
            $table->unsignedBigInteger('info_value_id');

            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');
            $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade');
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->foreign('info_value_id')->references('id')->on('info_values')->onDelete('cascade');

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
        Schema::dropIfExists('date_value');
    }
}
