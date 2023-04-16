<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->double('order_price_conditions')->nullable();
            $table->longText('desc')->nullable();
            $table->double('discount_price')->nullable();
            $table->integer('litmit')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('table_products')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_promotions');
    }
}
