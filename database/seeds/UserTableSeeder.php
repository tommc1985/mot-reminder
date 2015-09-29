<?php

use App\User as User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(['name' => 'Thomas', 'email' => 'leegleeders@yahoo.co.uk', 'password' => '$2y$10$nWS5yEoRPnnal5GVDOkKHO1ZA4B/rRqN7hrijVW8kqZcmmCpABfVS']);
    }

}