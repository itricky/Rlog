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
        Schema::create('user_job_info', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id')->comment('使用者ID'); // 使用者ID
            $table->string('company_name')->nullable()->default(null)->comment('公司名稱'); // 公司名稱
            $table->string('job_title')->nullable()->default(null)->comment('職稱'); // 職稱
            $table->date('job_start_day')->nullable()->default(null)->comment('起始日'); // 起始日
            $table->date('job_end_day')->nullable()->default(null)->comment('離職日'); // 離職日
            $table->enum('job_status', ['y','n'])->nullable()->default(null)->comment('是否在職'); // 是否在職
            $table->string('job_description')->nullable()->default(null)->comment('工作內容'); // 工作內容
            $table->softDeletes();
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
        Schema::dropIfExists('user_job_info');
    }
};
