<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user')->unsigned();
            $table->string('name');
            $table->string('cover')->nullable();
            $table->string('description')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('verify')->nullable();
            $table->string('status')->nullable();
            // $table->string('location')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // $table->foreign('location')->references('id')->on('location')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corporation');
    }
}
