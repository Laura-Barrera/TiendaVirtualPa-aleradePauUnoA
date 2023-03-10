<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipping_order_id');
            $table->foreign('shipping_order_id')
                ->references('id')
                ->on('shipping_orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('dateOrder');
            $table->decimal('fullValue',15,0);
            $table->unsignedBigInteger('id_PaymentMethod');
            $table->foreign('id_PaymentMethod')
                ->references('id')
                ->on('payment_methods')
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
        Schema::dropIfExists('order_details');
    }
}
