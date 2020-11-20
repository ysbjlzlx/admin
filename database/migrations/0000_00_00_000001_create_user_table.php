<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id()->comment('主键');
            $table->string('email')->default('')->comment('Email')->unique('uk_email');
            $table->string('password')->nullable()->comment('密码');
            $table->string('nickname')->nullable()->comment('昵称');
            $table->string('avatar')->nullable()->comment('头像');
            $table->dateTime('email_verified_at')->nullable()->comment('邮箱验证时间');
            $table->rememberToken();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->comment('更新时间')->index('idx_updated_at');
            $table->timestamp('created_at')->useCurrent()->comment('创建时间')->index('idx_created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
