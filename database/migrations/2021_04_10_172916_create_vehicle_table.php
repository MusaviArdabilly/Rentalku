<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user')->unsigned();
            $table->string('vehicle');
            $table->string('license_plate');
            $table->string('brand');
            $table->string('type');
            $table->string('color');
            $table->string('transmision');
            $table->string('chair_amount');
            $table->string('fuel_type');
            $table->string('price');
            $table->string('tax_payment_date');
            $table->string('license_plate_type');
            $table->string('license_plate_expiration_date');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')
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
        Schema::dropIfExists('vehicle');
    }
}
