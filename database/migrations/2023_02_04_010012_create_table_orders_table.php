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

        Schema::create('table_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable()->default(null);
            $table->unsignedInteger('user_id')->nullable();
            $table->string('shipping_fullname')->nullable()->default(null);
            $table->string('shipping_phone')->nullable()->default(null);
            $table->string('shipping_address')->nullable()->default(null);
            $table->string('order_payment')->nullable();
            $table->double('temp_price')->nullable();
            $table->double('total_price')->nullable();
            $table->double('ship_price')->nullable()->default(0);
            $table->mediumText('requirements')->nullable()->default(null);
            $table->mediumText('notes')->nullable()->default(null);
            $table->integer('status')->nullable(0);
            $table->foreign('user_id')->references('id')->on('table_users')->cascadeOnDelete();     
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
        Schema::dropIfExists('table_orders');
    }
};
