<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_vehicle')->unsigned();
            $table->bigInteger('id_corporation')->unsigned();
            $table->bigInteger('id_location')->unsigned();
            $table->string('picture')->nullable();
            $table->string('title');
            $table->string('description');
            $table->string('price');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_vehicle')->references('id')->on('vehicle')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_corporation')->references('id')->on('corporation')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_location')->references('id')->on('location')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
