<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('purchase_date');
            $table->string('delivery_date');
            $table->string('product_type');
            $table->string('product_quantity');
            $table->unsignedBigInteger('vehicle_type');
            $table->foreign('vehicle_type')->references('id')->on('vehicles')->onDelete('cascade');
            $table->string('product_description');
            $table->unsignedBigInteger('departure_route');
            $table->foreign('departure_route')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('arrival_route');
            $table->foreign('arrival_route')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('price');
            $table->integer('delivery');
            $table->boolean('tax', 0, 1);
            $table->boolean('status', 0, 1);
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
        Schema::dropIfExists('topics');
    }
}
