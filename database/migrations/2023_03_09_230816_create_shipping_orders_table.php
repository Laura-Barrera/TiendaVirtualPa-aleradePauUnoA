<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_orders', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('city');
            $table->string('department');
            $table->boolean('paymentStatus');
            $table->boolean('shippingStatus');
            $table->unsignedBigInteger('documentPerson');
            $table->foreign('documentPerson')
                ->references('id')
                ->on('customers')
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
        Schema::dropIfExists('shipping_order');
    }
}
