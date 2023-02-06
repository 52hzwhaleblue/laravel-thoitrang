<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('table_colors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numb')->nullable();
            $table->unsignedInteger('id_product')->nullable();
            $table->foreign('id_product')
                ->references('id')
                ->on('table_products')
                ->onDelete('cascade');
            $table->string('photo')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('color')->nullable()->default(null);
            $table->tinyInteger('type_show')->nullable();
            $table->string('type')->nullable()->default(null);
            $table->double('regular_price')->nullable();
            $table->double('sale_price')->nullable();
            $table->double('discount')->nullable();
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
        Schema::dropIfExists('table_colors');
    }
}
