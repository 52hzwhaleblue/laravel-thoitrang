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
            $table->unsignedInteger('id_order')->nullable();
            $table->foreign('id_order')
                ->references('id')
                ->on('table_orders')
                ->onDelete('cascade');
            $table->unsignedInteger('id_product')->nullable();
            $table->foreign('id_product')
                ->references('id')
                ->on('table_products')
                ->onDelete('cascade');
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
