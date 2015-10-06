<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mot extends Model
{
    protected $fillable = array('first_name', 'last_name', 'phone_number', 'email', 'vehicle_make', 'vehicle_reg', 'comments', 'mot_date');

    /**
     * Get the reminders associated with the MOT.
     */
    public function reminders()
    {
        return $this->hasMany('App\MotReminder');
    }

    /**
     * Save Reminders for the MOT
     * @param  array $data  Array of data, most probably request data
     */
    public function saveReminders($data)
    {
        if (isset($data['reminders'])) {

            \DB::table('mot_reminders')
                ->whereNotIn('reminder_id', $data['reminders'])
                ->where('mot_id', $this->id)
                ->delete();

            foreach ($data['reminders'] as $reminderId) {
                MotReminder::firstOrCreate(array('mot_id' => $this->id,'reminder_id'=>$reminderId));
            }

            return true;
        }

        \DB::table('mot_reminders')
            ->where('mot_id', $this->id)
            ->delete();

        return false;
    }
}
