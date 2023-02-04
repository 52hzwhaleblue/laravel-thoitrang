<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderDetailsTable extends Migration
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
            $table->integer('id_order')->nullable();
            $table->foreign('id_order')->references('id')->on('table_order');
            $table->integer('id_product')->nullable();
            $table->foreign('id_product')->references('id')->on('table_product');
            $table->string('photo')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('code')->nullable()->default(null);
            $table->string('color')->nullable()->default(null);
            $table->string('size')->nullable()->default(null);
            $table->double('regular_price')->nullable();
            $table->double('sale_price')->nullable();
            $table->integer('quantity')->nullable();
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
}
