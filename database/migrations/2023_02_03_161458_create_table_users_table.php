<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('table_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_permission')->nullable();
            $table->string('username')->nullable()->default(null);
            $table->string('password')->nullable()->default(null);
            $table->string('confirm_code')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
            $table->string('fullname')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->tinyInteger('gender')->nullable();
            $table->string('login_session')->nullable()->default(null);
            $table->string('user_token')->nullable()->default(null);
            $table->string('lastlogin')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            $table->tinyInteger('role')->nullable()->default(1);
            $table->string('secret_key')->nullable()->default(null);
            $table->integer('birthday')->nullable();
            $table->integer('numb')->nullable();
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
        Schema::dropIfExists('table_users');
    }
}
