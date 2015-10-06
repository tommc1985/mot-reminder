<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('mot_reminders')) {
            Schema::create('mot_reminders', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('mot_id')->unsigned();
                $table->integer('reminder_id')->unsigned();
                $table->date('sent_date')->nullable();
                $table->timestamps();

                $table->foreign('mot_id')->references('id')->on('mots')->onDelete('cascade');
                $table->foreign('reminder_id')->references('id')->on('reminders')->onDelete('cascade');
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
        if (Schema::hasTable('mot_reminders')) {
            Schema::drop('mot_reminders');
        }
    }
}
