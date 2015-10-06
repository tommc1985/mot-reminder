<?php

use App\Mot as Mot;
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

        Mot::create(['first_name' => 'Test Number','last_name' => 'One','phone_number' => '01234 567890', 'email' => 'test@test1.com', 'vehicle_make' => 'Ford Fiesta', 'vehicle_reg' => 'PN12 ASD', 'comments'=>'Tyre warning given', 'mot_date'=>'16-10-2015']);
    }
}
