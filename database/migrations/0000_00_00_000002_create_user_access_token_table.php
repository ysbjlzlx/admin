<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAccessTokenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_access_token', function (Blueprint $table) {
            $table->id()->comment('主键');
            $table->unsignedBigInteger('user_id')->default(0)->comment('用户 ID')->index('idx_user_id');
            $table->string('token')->default('')->comment('Token')->index('idx_token');
            $table->string('ua')->nullable()->comment('ua');
            $table->string('ip')->nullable()->comment('ip');
            $table->timestamp('deleted_at')->nullable()->comment('软删除时间');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->comment('更新时间')->index('idx_updated_at');
            $table->timestamp('created_at')->useCurrent()->comment('创建时间')->index('idx_created_at');
        }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_access_token');
    }
}
