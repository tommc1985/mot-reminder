<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('mots')) {
            Schema::create('mots', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('phone_number')->nullable();
                $table->string('email');
                $table->string('vehicle_make');
                $table->string('vehicle_reg');
                $table->mediumText('comments');
                $table->date('mot_date');
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
        if (Schema::hasTable('mots')) {
            Schema::drop('mots');
        }
    }
}
