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

        Schema::create('table_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo')->nullable()->default(null);
            $table->string('slug')->nullable();
            $table->string('name')->nullable()->default(null);
            $table->mediumText('desc')->nullable()->default(null);
            $table->mediumText('content')->nullable()->default(null);
            $table->mediumText('options')->nullable()->default(null);
            $table->integer('numb')->nullable();
            $table->integer('status')->default(1);
            $table->string('type')->nullable()->default(null);
            $table->integer('view')->nullable();
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
        Schema::dropIfExists('table_posts');
    }
};
