<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMessageSubjectField extends Migration
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
                $table->string('subject')
                    ->nullable()
                    ->after('description');
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
                $table->dropColumn('subject');
            });
        }
    }
}
