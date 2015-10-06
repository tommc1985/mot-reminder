<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = array('type', 'description', 'message', 'delay_before', 'delay_after', 'enabled');

    /**
     * Get the Reminders associated with the Message.
     */
    public function reminders()
    {
        return $this->hasMany('App\Reminder');
    }

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
