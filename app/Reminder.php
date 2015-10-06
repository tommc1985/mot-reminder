<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = array('type', 'description', 'message', 'delay_before', 'delay_after', 'enabled');

    /**
     * Returns an array of the possible types of reminder
     * @return array Types
     */
    public static function types()
    {
        return array(
            'sms' => 'SMS',
            'email' => 'Email',
        );
    }
}
