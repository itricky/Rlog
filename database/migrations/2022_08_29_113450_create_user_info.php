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
        Schema::create('user_info', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id')->comment('使用者ID');                                   // 使用者ID
            $table->string('name')      ->nullable()->default(NULL)->comment('姓名');          // 姓名
            $table->string('phone')     ->nullable()->default(NULL)->comment('電話');          // 電話
            $table->string('birthday')  ->nullable()->default(NULL)->comment('生日');          // 生日
            $table->string('address')   ->nullable()->default(NULL)->comment('地址');          // 地址
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
        Schema::dropIfExists('user_info');
    }
};
