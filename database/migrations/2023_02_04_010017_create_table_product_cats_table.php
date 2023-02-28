<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('table_product_cats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_list')->nullable();

            // $table->foreign('id_list')
            //     ->references('id')
            //     ->on('table_product_lists')
            //     ->onDelete('cascade');
            $table->mediumText('content')->nullable()->default(null);
            $table->string('slug');
            $table->mediumText('desc')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('photo')->nullable()->default(null);
            $table->mediumText('options')->nullable()->default(null);
            $table->integer('numb')->nullable();
            $table->json('status')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
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
        Schema::dropIfExists('table_product_cats');
    }
}
