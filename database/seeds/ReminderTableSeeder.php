<?php

use Illuminate\Database\Seeder;

class ReminderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Reminder::create(['mot_id' => 1,'message_id' => 1]);
        \App\Reminder::create(['mot_id' => 1,'message_id' => 2]);
        \App\Reminder::create(['mot_id' => 1,'message_id' => 3]);
        \App\Reminder::create(['mot_id' => 1,'message_id' => 5]);

        \App\Reminder::create(['mot_id' => 2,'message_id' => 2]);
        \App\Reminder::create(['mot_id' => 2,'message_id' => 4]);
        \App\Reminder::create(['mot_id' => 2,'message_id' => 5]);
        \App\Reminder::create(['mot_id' => 2,'message_id' => 6]);

        \App\Reminder::create(['mot_id' => 3,'message_id' => 1]);
        \App\Reminder::create(['mot_id' => 3,'message_id' => 2]);
        \App\Reminder::create(['mot_id' => 3,'message_id' => 3]);
        \App\Reminder::create(['mot_id' => 3,'message_id' => 4]);
        \App\Reminder::create(['mot_id' => 3,'message_id' => 5]);
        \App\Reminder::create(['mot_id' => 3,'message_id' => 6]);

        \App\Reminder::create(['mot_id' => 4,'message_id' => 1]);
        \App\Reminder::create(['mot_id' => 4,'message_id' => 2]);
        \App\Reminder::create(['mot_id' => 4,'message_id' => 3]);
        \App\Reminder::create(['mot_id' => 4,'message_id' => 4]);
        \App\Reminder::create(['mot_id' => 4,'message_id' => 5]);
        \App\Reminder::create(['mot_id' => 4,'message_id' => 6]);

        \App\Reminder::create(['mot_id' => 5,'message_id' => 1]);
        \App\Reminder::create(['mot_id' => 5,'message_id' => 4]);

        \App\Reminder::create(['mot_id' => 6,'message_id' => 1]);
        \App\Reminder::create(['mot_id' => 6,'message_id' => 2]);
        \App\Reminder::create(['mot_id' => 6,'message_id' => 5]);
    }
}
