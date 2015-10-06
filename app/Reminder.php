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
}
