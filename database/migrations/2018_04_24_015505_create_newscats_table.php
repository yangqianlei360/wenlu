<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewscatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newscats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('新闻分类名称');
            $table->string('enname')->comment('新闻英文名称');
            $table->integer('fid')->default(0)->comment('所属于的父类');
            $table->string('title')->nullable()->default(0)->comment('seo标题');
            $table->string('keyword')->nullable()->comment('关键词');
            $table->string('desc')->nullable()->comment('描述');
            $table->boolean('display')->default('1')->comment('显示/隐藏');
            $table->integer('sort')->default(0)->comment('排序');
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
        Schema::dropIfExists('newscats');
    }
}
