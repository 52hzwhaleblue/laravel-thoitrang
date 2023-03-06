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
        Schema::create('table_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('order_id')->nullable();
            $table->integer('star')->nullable();
            $table->string('content')->nullable();
            $table->foreign('product_id')->references('id')->on('table_products')->cascadeOnDelete();
            $table->foreign('order_id')->references('id')->on('table_orders')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('table_users')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('table_review_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('review_id');
            $table->string('photo')->nullable();
            $table->foreign('review_id')->references('id')->on('table_reviews')->cascadeOnDelete();
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
        Schema::dropIfExists('reviews');
    }
};
