<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:send {count?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send out reminders for upcoming MOTs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $count = $this->argument('count');

        $messages = \App\Message::where('enabled', 1)
            ->get();

        foreach ($messages as $message) {
            $reminders = $message->eligibleReminders();

            foreach ($reminders as $reminder) {

            }
        }
    }
}
