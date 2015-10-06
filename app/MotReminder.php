<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotReminder extends Model
{
    protected $fillable = array('mot_id', 'reminder_id', 'sent');
}
