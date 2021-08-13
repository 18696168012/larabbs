<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('帖子标题');
            $table->text('body')->comment('帖子内容');
            $table->integer('user_id')->index()->unsigned()->comment('用户 ID');
            $table->integer('category_id')->index()->unsigned()->comment('分类 ID');
            $table->integer('reply_count')->index()->unsigned()->default(0)->comment('回复数量');
            $table->integer('view_count')->index()->unsigned()->default(0)->comment('查看总数');
            $table->integer('last_reply_user_id')->unsigned()->default(0)->comment('最后回复的用户 ID');
            $table->integer('order')->default(0)->comment('可用来做排序使用');
            $table->text('excerpt')->nullable(0)->comment('文章摘要，SEO 优化时使用');
            $table->string('slug')->nullable()->comment('SEO 友好的 URI');
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
        Schema::dropIfExists('topics');
    }
}
