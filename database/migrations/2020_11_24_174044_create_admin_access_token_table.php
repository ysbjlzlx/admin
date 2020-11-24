<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminAccessTokenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_access_token', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->default(0)->comment('admin id');
            $table->string('access_token')->default('')->comment('access_token');
            $table->string('ua')->comment('user agent');
            $table->string('ips')->comment('ips');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->comment('更新时间');
            $table->timestamp('created_at')->useCurrent()->comment('创建时间');
            $table->index('admin_id', 'idx_admin_id');
            $table->index('access_token', 'idx_access_token');
            $table->index('updated_at', 'idx_updated_at');
            $table->index('created_at', 'idx_created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_access_token');
    }
}
