<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mot extends Model
{
    protected $fillable = array('first_name', 'last_name', 'phone_number', 'email', 'vehicle_make', 'vehicle_reg', 'comments', 'mot_date', 'expiry_date');

    /**
     * Get the Reminders associated with the MOT.
     */
    public function reminders()
    {
        return $this->hasMany('App\Reminder');
    }

    /**
     * Save Reminders for the MOT
     * @param  array $data  Array of data, most probably request data
     */
    public function saveReminders($data)
    {
        if (isset($data['messages'])) {

            \DB::table('reminders')
                ->whereNotIn('message_id', $data['messages'])
                ->where('mot_id', $this->id)
                ->delete();

            foreach ($data['messages'] as $messageId) {
                Reminder::firstOrCreate(array('mot_id' => $this->id,'message_id'=>$messageId));
            }

            return true;
        }

        \DB::table('reminders')
            ->where('mot_id', $this->id)
            ->delete();

        return false;
    }
}
