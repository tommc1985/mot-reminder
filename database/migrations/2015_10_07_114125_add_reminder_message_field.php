<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReminderMessageField extends Migration
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
                $table->mediumText('sent_message')
                    ->nullable()
                    ->after('sent_date');
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
                $table->dropColumn('sent_message');
            });
        }
    }
}
