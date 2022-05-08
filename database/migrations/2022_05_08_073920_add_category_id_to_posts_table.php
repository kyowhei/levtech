<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();    #unsigned型で定義
            #'categoriesテーブル'の'id'を参照する外部キーとして'category_id'を追加
        });
    }
    
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
}
