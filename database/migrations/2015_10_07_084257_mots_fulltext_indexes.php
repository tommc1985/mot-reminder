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
            /*DB::statement('ALTER TABLE mots ADD FULLTEXT full_first_name(first_name)');
            DB::statement('ALTER TABLE mots ADD FULLTEXT full_last_name(last_name)');
            DB::statement('ALTER TABLE mots ADD FULLTEXT full_phone_number(phone_number)');
            DB::statement('ALTER TABLE mots ADD FULLTEXT full_email(email)');
            DB::statement('ALTER TABLE mots ADD FULLTEXT full_vehicle_make(vehicle_make)');
            DB::statement('ALTER TABLE mots ADD FULLTEXT full_vehicle_reg(vehicle_reg)');
            DB::statement('ALTER TABLE mots ADD FULLTEXT full_comments(comments)');*/
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
            DB::statement('ALTER TABLE mots DROP INDEX full_first_name');
            DB::statement('ALTER TABLE mots DROP INDEX full_last_name');
            DB::statement('ALTER TABLE mots DROP INDEX full_phone_number');
            DB::statement('ALTER TABLE mots DROP INDEX full_email');
            DB::statement('ALTER TABLE mots DROP INDEX full_vehicle_make');
            DB::statement('ALTER TABLE mots DROP INDEX full_vehicle_reg');
            DB::statement('ALTER TABLE mots DROP INDEX full_comments');
        }
    }
}
