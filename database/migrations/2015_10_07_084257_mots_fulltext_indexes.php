<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MotsFulltextIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('mots')) {
            DB::statement('ALTER TABLE mots ADD FULLTEXT full_mots(first_name, last_name, phone_number, email, vehicle_make, vehicle_reg, comments)');
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
            DB::statement('ALTER TABLE mots DROP INDEX full_mots');
        }
    }
}
