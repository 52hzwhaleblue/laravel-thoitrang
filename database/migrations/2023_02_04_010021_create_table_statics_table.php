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

        Schema::create('table_statics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo')->nullable()->default(null);
            $table->string('photo1')->nullable()->default(null);
            $table->mediumText('options')->nullable()->default(null);
            $table->mediumText('content')->nullable()->default(null);
            $table->mediumText('desc')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('file_attach')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
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
        Schema::dropIfExists('table_statics');
    }
}
;