<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeMessageDelayFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('messages')) {
            Schema::table('messages', function ($table) {
                $table->dropColumn('delay_after');
                $table->renameColumn('delay_before', 'threshold');
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
        if (Schema::hasTable('messages')) {
            Schema::table('messages', function ($table) {
                $table->renameColumn('threshold', 'delay_before');
                $table->integer('delay_after')->after('delay_before');
            });
        }
    }
}
