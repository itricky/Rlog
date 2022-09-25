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
        Schema::table('user_autobiography', function (Blueprint $table) {
            $table->string('autobiography',15000)->change(); // 使用者自傳
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_autobiography', function (Blueprint $table) {
            $table->string('autobiography')->change(); // 使用者自傳
        });
    }
};
