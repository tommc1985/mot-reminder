<?php

use Illuminate\Database\Seeder;

class MotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mots')->delete();

        \App\Mot::create(['first_name' => 'Test Number','last_name' => 'One','phone_number' => '01234 567890', 'email' => 'test@test1.com', 'vehicle_make' => 'Ford Fiesta', 'vehicle_reg' => 'PN12 ASD', 'comments'=>'Tyre warning given', 'mot_date'=>'2015-10-16']);
        \App\Mot::create(['first_name' => 'Thomas','last_name' => 'McGregor','phone_number' => '07771123456', 'email' => 'test2@hotmail.com', 'vehicle_make' => 'Peugeot 806', 'vehicle_reg' => 'ED12 VTY', 'comments'=>'Exhaust warning given', 'mot_date'=>'2015-10-07']);
        \App\Mot::create(['first_name' => 'Test Number','last_name' => 'Three','phone_number' => '01234 567890', 'email' => 'test3@gmail.com', 'vehicle_make' => 'Ferrari', 'vehicle_reg' => 'FER 1', 'comments'=>'', 'mot_date'=>'2015-09-02']);
        \App\Mot::create(['first_name' => 'Test Number','last_name' => 'Four','phone_number' => '01234 567890', 'email' => 'test4@yahoo.com', 'vehicle_make' => 'Ford Sierra', 'vehicle_reg' => 'G402 ASE', 'comments'=>'', 'mot_date'=>'2014-09-17', 'expiry_date'=>'2015-10-27']);
        \App\Mot::create(['first_name' => 'Test Number','last_name' => 'Five','phone_number' => '01234 567890', 'email' => 'test5@freeserve.net', 'vehicle_make' => 'Renault Clio', 'vehicle_reg' => 'S293 HJV', 'comments'=>'', 'mot_date'=>'2014-10-02', 'expiry_date'=>'2015-10-11']);
        \App\Mot::create(['first_name' => 'Test Number','last_name' => 'Six','phone_number' => '01234 567890', 'email' => 'test6@googlemail.com', 'vehicle_make' => 'Citroen C2', 'vehicle_reg' => 'AD02 PYF', 'comments'=>'', 'mot_date'=>'2014-10-01', 'expiry_date'=>'2015-10-13']);
    }
}
