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
        \App\Message::create(['type' => 'sms','description' => '1 week reminder (SMS)','message'=>'Hi #FIRST_NAME#, it\'s Mike from MPK Autos. It appears your #VEHICLE_MAKE#\'s MOT is due next week. To book it in ring me on #MPK_TEL_NO#','threshold' => 7, 'enabled' => 1]);
        \App\Message::create(['type' => 'sms','description' => '2 week reminder (SMS)','message'=>'Hi #FIRST_NAME#, it\'s Mike from MPK Autos. It appears your #VEHICLE_MAKE#\'s MOT is due in two weeks. To book it in ring me on #MPK_TEL_NO#','threshold' => 14, 'enabled' => 1]);
        \App\Message::create(['type' => 'sms','description' => '1 month reminder (SMS)','message'=>'Hi #FIRST_NAME#, it\'s Mike from MPK Autos. It appears your #VEHICLE_MAKE#\'s MOT is due next month. To book it in ring me on #MPK_TEL_NO# or email me at #MPK_AUTOS_EMAIL#','threshold' => 28, 'enabled' => 1]);

        // Email
        \App\Message::create(['type' => 'email','description' => '1 week reminder (Email)','subject'=>'MPK Autos: #FIRST_NAME#, your MOT expires in 1 week','message'=>'Hi #FIRST_NAME#, it\'s Mike from MPK Autos. It appears your #VEHICLE_MAKE#\'s MOT is due next week. To book it in ring me on #MPK_TEL_NO#','threshold' => 7, 'enabled' => 1]);
        \App\Message::create(['type' => 'email','description' => '2 week reminder (Email)','subject'=>'MPK Autos: #FIRST_NAME#, your MOT expires in 2 weeks\'s time','message'=>'Hi #FIRST_NAME#, it\'s Mike from MPK Autos. It appears your #VEHICLE_MAKE#\'s MOT is due in two weeks. To book it in ring me on #MPK_TEL_NO#','threshold' => 14, 'enabled' => 1]);
        \App\Message::create(['type' => 'email','description' => '1 month reminder (Email)','subject'=>'MPK Autos: #FIRST_NAME#, your MOT expires next month','message'=>'Hi #FIRST_NAME#, it\'s Mike from MPK Autos. It appears your #VEHICLE_MAKE#\'s MOT is due in a month\'s time. To book it in ring me on #MPK_TEL_NO# or email me at #MPK_AUTOS_EMAIL#','threshold' => 28, 'enabled' => 1]);
    }
}
