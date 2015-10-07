<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        \DB::table('reminders')->delete();

        $this->call('UserTableSeeder');
        $this->call('MessageTableSeeder');
        $this->call('MotTableSeeder');
        $this->call('ReminderTableSeeder');

        Model::reguard();
    }
}
