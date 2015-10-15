<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReminderCreditsField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('reminders')) {
            Schema::table('reminders', function ($table) {
                $table->integer('credits')
                    ->nullable()
                    ->after('sent_message');
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
            Schema::table('reminders', function ($table) {
                $table->dropColumn('credits');
            });
        }
    }
}
