<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('order_from');
            $table->integer('sales_id');
            $table->unsigned('discount')->nullable();
            $table->unsigned('shipping_fee')->nullable();
            $table->integer('courier')->nullable();
            $table->unsigned('total');
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
        Schema::dropIfExists('header_sales');
    }
}
