<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('table_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_category')->nullable();
            $table->foreign('id_category')
                ->references('id')
                ->on('table_categories')
                ->onDelete('cascade');
            $table->string('name')->nullable()->default(null);
            $table->string('photo')->nullable()->default(null);
            $table->string('photo1')->nullable()->default(null);
            $table->json('properties')->nullable();
            $table->mediumText('content')->nullable()->default(null);
            $table->mediumText('desc')->nullable()->default(null);
            $table->string('slug');
            $table->string('code')->nullable()->default(null);
            $table->double('regular_price')->nullable();
            $table->double('discount')->nullable();
            $table->double('sale_price')->nullable();
            $table->integer('numb')->nullable();
            $table->json('status')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->integer('date_created')->nullable();
            $table->integer('date_updated')->nullable();
            $table->integer('view')->nullable();
            $table->integer('stock')->nullable();
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
        Schema::dropIfExists('table_products');
    }
}
