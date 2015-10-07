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
    }
}
