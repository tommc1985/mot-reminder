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
     * Placeholders for message subject and body
     * @return array  Placeholders
     */
    public static function placeholders()
    {
        return array(
            '#FIRST_NAME#',
            '#LAST_NAME#',
            '#PHONE_NUMBER#',
            '#EMAIL#',
            '#VEHICLE_MAKE#',
            '#VEHICLE_REG#',
            '#EXPIRY_DATE#',
        );
    }

    /**
     * Placeholder values for message subject and body
     * @return array  Placeholder values
     */
    public function placeholdersValues()
    {
        return array(
            $this->mot->first_name,
            $this->mot->last_name,
            $this->mot->phone_number,
            $this->mot->email,
            $this->mot->vehicle_make,
            $this->mot->vehicle_reg,
            $this->mot->expiry_date,
        );
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
    public function sendSMS()
    {

    }

    /**
     * Send the Email reminder
     */
    public function sendEmail()
    {
        $subject = $this->_processSubject();
        $message = $this->_processBody();
    }

    /**
     * Process the body of the message (inject Customer-specific values)
     */
    protected function _processBody()
    {
        return str_replace(self::placeholders(), $this->placeholdersValues(), $this->message->message);
    }

    /**
     * Process the body of the subject (inject Customer-specific values)
     */
    protected function _processSubject()
    {
        return str_replace(self::placeholders(), $this->placeholdersValues(), $this->message->subject);
    }
}
