<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageColumnToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('image',100)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
}
