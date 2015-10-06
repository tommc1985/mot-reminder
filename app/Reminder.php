<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = array('type', 'description', 'message', 'delay_before', 'delay_after', 'enabled');

    /**
     * Get the MOT Reminders associated with the Reminder.
     */
    public function motReminders()
    {
        return $this->hasMany('App\MotReminder');
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
