<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
           // $table->string('status',10); // varchar = 文字列
            
            // +- = sign / unsigned = 符号なし = + のみ
            // index = 索引 = MySQLに索引してくださいと指示するためのもの = 検索する際にスピードアップします
            $table->integer('user_id')->unsigned()->index();
            //外部キー
            $table->foreign('user_id')->references('id')->on('users');
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
           // $table->dropColumn('status',10);
            Schema::dropIfExists('tasks');
        });
    }
}
