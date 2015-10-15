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
    }

    /**
     * Send message
     * @return mixed If success, and an array of info, otherwise false
     */
    public function send($to, $messageBody)
    {
        try {
            $credits = $this->calculateSMSCredits($messageBody);

            switch ($this->_mode) {
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

                    // Send
                    $result = $this->_client->send($message);
                    if($result['success']) {
                        return ['result'=>'success','credits'=>$credits];
                    } else {
                        // Send email
                        $subject = $e->getMessage();
                        $vars = ['reminder'=>$this,'messageBody'=>$messageBody];
                        \Mail::send('errors.sms_error', $vars, function($message) use ($subject)
                        {
                            $message->to(env('DEVELOPER_EMAIL'))->subject($subject);
                        });
                        echo 'Message failed - Error: ' . $result['error_message'];
                    }

                    break;
            }
        } catch (ClockworkException $e) {
            echo 'Exception sending SMS: ' . $e->getMessage();
        }

        return false;
    }

    /**
     * Calculate the number of credits the SMS message is likely to use
     * @param  string $messageBody The SMS message to be sent
     */
    public function calculateSMSCredits($messageBody)
    {
        try {
            $messageLength = strlen($messageBody);
            switch (true) {
                case $messageLength <= 160:
                    return 1; // 1 credit
                    break;
                case $messageLength <= 320 && $messageLength > 160:
                    return 2; // 2 credits
                    break;
                case $messageLength <= 480 && $messageLength > 320:
                    return 3; // 3 credits
                    break;
                default:
                    throw new \Exception("SMS message too long (ID:{$this->id})");
            }
        } catch (\Exception $e) {
            // Send email
            $subject = $e->getMessage();
            $vars = ['messageBody'=>$messageBody];
            \Mail::send('errors.sms_length', $vars, function($message) use ($subject)
            {
                $message->to(env('DEVELOPER_EMAIL'))->subject($subject);
            });
        }
    }
}