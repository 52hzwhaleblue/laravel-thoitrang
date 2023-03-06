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

        Schema::create('table_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('slug')->nullable();
            $table->double('regular_price')->nullable();
            $table->double('discount')->nullable();
            $table->double('sale_price')->nullable();
            $table->json('properties')->nullable();
            $table->mediumText('options')->nullable()->default(null);
            $table->mediumText('desc')->nullable()->default(null);
            $table->mediumText('content')->nullable()->default(null);
            $table->integer('numb')->nullable();
            $table->string('type')->nullable()->default(null);
            $table->integer('view')->nullable();
            $table->integer('stock')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->foreign('category_id')->references('id')->on('table_categories')->onDelete('cascade');
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
};
