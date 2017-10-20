<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSermonToTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->increments('id');
        $table->string('title');
        $table->text('body');
        $table->integer('user_id')->default(0);
        $table->boolean('done')->default(0);
        $table->timestamps();
        $table->text('image');
        $table->text('sermon');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('tasks');
    }
}
