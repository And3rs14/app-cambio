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
            $table->primary('info_value_id');

            $table->dateTime('date');

            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('value_id')->constrained('values')->onDelete('cascade');
            
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
        Schema::dropIfExists('info_values');
    }
}
