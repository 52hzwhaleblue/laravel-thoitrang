<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('table_sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_product');
            // $table->foreign('id_product')
            //     ->references('id')
            //     ->on('table_products')
            //     ->onDelete('cascade');
            $table->string('name')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->integer('numb')->nullable();
            $table->string('status')->nullable()->default(null);
            $table->integer('date_created')->nullable();
            $table->integer('date_updated')->nullable();
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
        Schema::dropIfExists('table_sizes');
    }
}
