<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            //topic_id:integer:unsigned:default(0):index,
            //user_id:bigInteger:unsigned:default(0):index,
            //content:text
            $table->id();
            $table->integer('topic_id')->unsigned()->default(0)->index();
            $table->bigInteger('user_id')->unsigned()->default(0)->index();
            $table->text('content');
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
        Schema::dropIfExists('replies');
    }
}
