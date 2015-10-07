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
    public function sendSMS()
    {

    }

    /**
     * Send the Email reminder
     */
    public function sendEmail()
    {
        $this->_processMessageBody();
    }

    /**
     * Send the Email reminder
     */
    protected function _processMessageBody()
    {
        $placeholders = array(
            '#FIRST_NAME#',
            '#LAST_NAME#',
            '#PHONE_NUMBER#',
            '#EMAIL#',
            '#VEHICLE_MAKE#',
            '#VEHICLE_REG#',
            '#EXPIRY_DATE#',
        );

        $values = array(
            $this->mot->first_name,
            $this->mot->last_name,
            $this->mot->phone_number,
            $this->mot->email,
            $this->mot->vehicle_make,
            $this->mot->vehicle_reg,
            $this->mot->expiry_date,
        );

        $messageBody = str_replace($placeholders, $values, $this->message->message);

        var_dump($messageBody);
    }
}
