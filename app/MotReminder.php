<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotReminder extends Model
{
    protected $fillable = array('mot_id', 'reminder_id', 'sent_date');

    /**
     * Get the MOT associated with the MOT Reminder.
     */
    public function mot()
    {
        return $this->belongsTo('App\Mot');
    }

    /**
     * Get the Reminder associated with the MOT Reminder.
     */
    public function reminder()
    {
        return $this->belongsTo('App\Reminder');
    }
}
