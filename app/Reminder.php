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
            date('jS F Y', strtotime($this->mot->expiry_date)),
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


        return true;
    }

    /**
     * Send the Email reminder
     */
    public function sendEmail()
    {
        $mot = $this->mot;
        $to = $this->mot->email;
        $subject = $this->_processSubject();
        $messageBody = $this->_processBody();
        $messageHtmlBody = $this->_processHtmlBody();

        // Set vars
        $vars = [
            'subject' => $subject,
            'messageBody' => $messageHtmlBody,
            'mode' => 'live',
        ];

        // If in dev mode
        if (env('MAIL_MODE', 'dev') !== 'live') {
            $to = env('DEVELOPER_EMAIL');
            $vars['mode'] = 'dev';
            $vars['intendedRecipient'] = $this->mot->email;
        }

        // Send email
        \Mail::send('reminders.email_html', $vars, function($message) use ($to, $subject, $mot)
        {
            $message->to($to, $mot->first_name . ' ' . $mot->last_name)->subject($subject);
        });

        $this->sent_date = date('Y-m-d H:i:s');
        $this->sent_message = $messageBody;
        $this->save();

        return true;
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

    /**
     * Process the copy into HTML for email template
     */
    protected function _processHtmlBody()
    {
        $markup = [
            'salutation' => ['<h3 style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">', '</h3>'],
            'paragraph' => ['<div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;margin-top:10px;color:#5F5F5F;line-height:135%;">','</div>'],
        ];

        $processedBody = '';
        $copyLines = explode(PHP_EOL, $this->_processBody());
        foreach ($copyLines as $i => $copyLine) {
            switch ($i) {
                case 0:
                    $processedBody .= $markup['salutation'][0] . $copyLine . $markup['salutation'][1];
                    break;
                default:
                    $processedBody .= $markup['paragraph'][0] . $copyLine . $markup['paragraph'][1];
            }
        }

        return $processedBody;
    }
}
