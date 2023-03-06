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

        Schema::create('table_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('options')->nullable()->default(null);
            $table->mediumText('mastertool')->nullable()->default(null);
            $table->mediumText('headjs')->nullable()->default(null);
            $table->mediumText('bodyjs')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->mediumText('analytics')->nullable()->default(null);
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
        Schema::dropIfExists('table_settings');
    }
};
