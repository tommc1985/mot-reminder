<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = array('type', 'description', 'subject', 'message', 'threshold', 'enabled');

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

    /**
     * Fetch eligible reminders
     */
    public function eligibleReminders()
    {
        if ($this->enabled) {
            $expiry = $this->threshold * 86400;
            $expiryDate = date('Y-m-d', time() + $expiry);

            $reminders = \App\Reminder::select('reminders.*')
                ->join('mots', 'reminders.mot_id','=','mots.id')
                ->where('mots.expiry_date', $expiryDate)
                ->get();

            return $reminders;
        }

        return array();
    }
}
