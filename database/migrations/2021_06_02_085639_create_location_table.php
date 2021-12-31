<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user')->unsigned();
            $table->string('id_province')->nullable();
            $table->string('id_regency')->nullable();
            $table->string('id_district')->nullable();
            $table->string('id_village')->nullable();
            $table->string('street')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_province')->references('id')->on('provinces')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_regency')->references('id')->on('regencies')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_district')->references('id')->on('districts')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_village')->references('id')->on('villages')
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
        Schema::dropIfExists('location');
    }
}
