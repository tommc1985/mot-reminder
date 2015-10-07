<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = array('mot_id', 'message_id', 'sent_date');

    /**
     * Get the MOT associated with the Reminder.
     */
    public function mot()
    {
        return $this->belongsTo('App\Mot');
    }

    /**
     * Get the Message associated with the Reminder.
     */
    public function message()
    {
        return $this->belongsTo('App\Message');
    }

    /**
     * Send the reminder to the customer
     */
    public function send()
    {
        switch ($this->message->type) {
            case 'sms':
                return $this->sendSMS();
                break;
            case 'email':
                return $this->sendEmail();
                break;
        }

        return false;
    }

    /**
     * Send the SMS reminder
     */
    public function sendSMS ()
    {

    }

    /**
     * Send the Email reminder
     */
    public function sendEmail ()
    {

    }
}
