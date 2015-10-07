<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMotExpiryDateField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('mots')) {
            Schema::table('mots', function ($table) {
                $table->date('expiry_date')
                    ->nullable()
                    ->after('mot_date');
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
        if (Schema::hasTable('mots')) {
            Schema::table('mots', function ($table) {
                $table->dropColumn('expiry_date');
            });
        }
    }
}
