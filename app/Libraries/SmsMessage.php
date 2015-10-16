<?php
namespace App\Libraries;

use Log;

/**
 * Wrapper for Clockwork SMS Service API
 */
class SmsMessage {
    public $from, $to, $message;

    protected $_client, $_mode;

    /**
     * Constructor
     */
    public function __construct()
    {
        $options = [
            'from' => env('SMS_FROM'),
        ];

        $this->_mode = env('SMS_MODE', 'dev');

        if ('dev' == $this->_mode || 'live' == $this->_mode) {
            // Create a Clockwork object using your API key
            $this->_client = new Clockwork(env('CLOCKWORK_SMS_API'), $options);
        }

        $this->checkBalance();
    }

    /**
     * Send message
     * @return mixed If success, and an array of info, otherwise false
     */
    public function send($to, $messageBody)
    {
        try {
            $credits = $this->calculateSMSCredits($messageBody);

            if ($credits !== false) {

                switch ($this->_mode ) {
                    case 'pretend':
                        Log::info("SMS Message sent" . PHP_EOL .
                            "To: {$to}" . PHP_EOL .
                            "Messsage: \"{$messageBody}\"" . PHP_EOL .
                            'Message Length: ' . strlen($messageBody) . PHP_EOL .
                            "Credits: {$credits}");
                        break;
                    case 'dev': // If in dev mode run this, then run the live mode functionality
                        $to = env('DEVELOPER_TEL');
                        $messageBody = 'DEV:' . $messageBody;
                    case 'live':
                        // Setup and send a message
                        $message = [
                            'to'      => $to,
                            'message' => $messageBody
                        ];

                        // Send message
                        $result = $this->_client->send($message);
                        if($result['success']) {
                            return ['result'=>'success','credits'=>$credits];
                        } else {
                            return ['result'=>'error','message'=>$result['error_message']];
                        }
                }
            } else {
                return ['result'=>'error','message'=>'Message too long to send.'];
            }
        } catch (ClockworkException $e) {
            return ['result'=>'error','message'=>'ClockworkException: ' . $e->getMessage()];
        }

        return ['result'=>'error','message'=>'Unspecified error.'];
    }

    /**
     * Calculate the number of credits the SMS message is likely to use
     * @param  string $messageBody The SMS message to be sent
     */
    public function calculateSMSCredits($messageBody)
    {
        $messageLength = strlen($messageBody);
        switch (true) {
            case $messageLength <= 160:
                return 1; // 1 credit
                break;
            case $messageLength <= 320 && $messageLength > 160:
                return 2; // 2 credits
                break;
            case $messageLength <= 459 && $messageLength > 320:
                return 3; // 3 credits
                break;
        }

        return false;
    }

    /**
     * Check balance in SMS Service account, send warning if balance too low
     */
    public function checkBalance()
    {
        if ($this->_client) {
            $balance = $this->_client->checkBalance();

            if ($balance['balance'] <= env('SMS_CREDIT_THRESHOLD')) {
                // Send warning email
                $subject = 'SMS service balance running low';
                $vars = ['balance'=>$balance];
                \Mail::send(['text'=>'errors.sms_balance'], $vars, function($message) use ($subject)
                {
                    $message->to(env('DEVELOPER_EMAIL'))->subject($subject);
                });
            }
        }
    }
}