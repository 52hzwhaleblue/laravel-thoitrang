<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('table_order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id')->nullable();
            $table->unsignedInteger('product_detail_id')->nullable();
            $table->string('color')->nullable()->default(null);
            $table->string('size')->nullable()->default(null);
            $table->integer('quantity')->nullable();
            $table->double('price')->nullable();
            $table->string('photo')->nullable();
            $table->foreign('order_id')->references('id')->on('table_orders')->onDelete('cascade');
            $table->foreign('product_detail_id')->references('id')->on('table_product_details')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_order_details');
    }
};
