<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('user_name');
            $table->string('password')->nullable();
            $table->string('reset_password_code')->nullable();
            $table->dateTime('reset_password_code_at')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('full_name', 50)->nullable();
            $table->integer('role_id');
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->smallInteger('is_active')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
