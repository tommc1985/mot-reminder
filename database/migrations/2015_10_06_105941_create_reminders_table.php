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
            Schema::create('reminders', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('type');
                $table->string('description');
                $table->mediumText('message');
                $table->integer('delay_before');
                $table->integer('delay_after');
                $table->tinyInteger('enabled')->default(1);
                $table->timestamps();
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
