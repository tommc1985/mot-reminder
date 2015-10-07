<?php

use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->delete();

        // SMS
        \App\Message::create(['type' => 'sms','description' => '1 week reminder (SMS)','message'=>'Hi #FIRST_NAME#, it\'s Mike from MPK Autos. It appears your #VEHICLE_MAKE#\'s MOT is due next week. To book it in ring me on #TEL_NO#','threshold' => 7, 'enabled' => 1]);
        \App\Message::create(['type' => 'sms','description' => '2 week reminder (SMS)','message'=>'Hi #FIRST_NAME#, it\'s Mike from MPK Autos. It appears your #VEHICLE_MAKE#\'s MOT is due is two weeks. To book it in ring me on #TEL_NO#','threshold' => 14, 'enabled' => 1]);
        \App\Message::create(['type' => 'sms','description' => '1 month reminder (SMS)','message'=>'Hi #FIRST_NAME#, it\'s Mike from MPK Autos. It appears your #VEHICLE_MAKE#\'s MOT is due next week. To book it in ring me on #TEL_NO#','threshold' => 28, 'enabled' => 1]);

        // Email
        \App\Message::create(['type' => 'email','description' => '1 week reminder (Email)','message'=>'Hi #FIRST_NAME#, it\'s Mike from MPK Autos. It appears your #VEHICLE_MAKE#\'s MOT is due next week. To book it in ring me on #TEL_NO#','threshold' => 7, 'enabled' => 1]);
        \App\Message::create(['type' => 'email','description' => '2 week reminder (Email)','message'=>'Hi #FIRST_NAME#, it\'s Mike from MPK Autos. It appears your #VEHICLE_MAKE#\'s MOT is due is two weeks. To book it in ring me on #TEL_NO#','threshold' => 14, 'enabled' => 1]);
        \App\Message::create(['type' => 'email','description' => '1 month reminder (Email)','message'=>'Hi #FIRST_NAME#, it\'s Mike from MPK Autos. It appears your #VEHICLE_MAKE#\'s MOT is due next week. To book it in ring me on #TEL_NO#','threshold' => 28, 'enabled' => 1]);
    }
}
