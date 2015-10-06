<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mot extends Model
{
    protected $fillable = array('first_name', 'last_name', 'phone_number', 'email', 'vehicle_make', 'vehicle_reg', 'comments', 'mot_date');
}
