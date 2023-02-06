<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrdersTable extends Migration
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
            $table->integer('numb')->nullable();
            $table->unsignedInteger('id_user')->nullable();
            $table->foreign('id_user')
            ->references('id')
            ->on('table_users')
            ->onDelete('cascade');
            $table->string('code')->nullable()->default(null);
            $table->string('fullname')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->integer('order_payment')->nullable();
            $table->double('temp_price')->nullable();
            $table->double('total_price')->nullable();
            $table->integer('city')->nullable();
            $table->integer('district')->nullable();
            $table->integer('ward')->nullable();
            $table->double('ship_price')->nullable();
            $table->mediumText('requirements')->nullable()->default(null);
            $table->mediumText('notes')->nullable()->default(null);
            $table->integer('order_status')->nullable();
            $table->foreign('order_status')->references('id')->on('table_order_status');
            $table->integer('date_created')->nullable();
            $table->integer('date_updated');
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
}
