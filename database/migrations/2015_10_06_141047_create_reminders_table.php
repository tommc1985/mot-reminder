<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('reminders')) {
            Schema::create('reminders', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('mot_id')->unsigned();
                $table->integer('message_id')->unsigned();
                $table->dateTime('sent_date')->nullable();
                $table->timestamps();

                $table->foreign('mot_id')->references('id')->on('mots')->onDelete('cascade');
                $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('reminders')) {
            Schema::drop('reminders');
        }
    }
}
