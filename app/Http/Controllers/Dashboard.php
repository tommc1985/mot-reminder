<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Dashboard extends Controller
{

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = date('Y-m-d');
        $last7Days = date('Y-m-d', time() - (86400 * 7));
        $last30Days = date('Y-m-d', time() - (86400 * 30));
        $next30Days = date('Y-m-d', time() + (86400 * 30));

        $data = [];
        // MOTs
        $data['motCount'] = \DB::table('mots')
            ->count();

        $data['motExpiringCount'] = \DB::table('mots')
            ->where('expiry_date', '>=', $now)
            ->count();

        $data['motExpiringNext30Days'] = \DB::table('mots')
            ->where('expiry_date', '>=', $now)
            ->where('expiry_date', '<', $next30Days)
            ->orderBy('expiry_date', 'asc')
            ->get();

        // All Reminders
        $data['reminderCount'] = \DB::table('reminders')
            ->count();

        $data['sentReminderCount'] = \DB::table('reminders')
            ->whereNotNull('sent_date')
            ->count();

        // Email Reminders
        $data['emailReminderCount'] = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'email')
            ->count();

        $data['sentEmailReminderCount'] = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'email')
            ->whereNotNull('sent_date')
            ->count();

        $data['sentEmailRemindersLast7DaysCount'] = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'email')
            ->whereNotNull('sent_date')
            ->where('sent_date', '>=', $last7Days)
            ->count();

        $data['sentEmailRemindersLast30DaysCount'] = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'email')
            ->whereNotNull('sent_date')
            ->where('sent_date', '>=', $last30Days)
            ->count();

        // SMS Reminders
        $data['smsReminderCount'] = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'sms')
            ->count();

        $data['sentSmsReminderCount'] = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'sms')
            ->whereNotNull('sent_date')
            ->count();

        $data['sentSmsRemindersLast7DaysCount'] = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'sms')
            ->whereNotNull('sent_date')
            ->where('sent_date', '>=', $last7Days)
            ->count();

        $data['sentSmsRemindersLast30DaysCount'] = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'sms')
            ->whereNotNull('sent_date')
            ->where('sent_date', '>=', $last30Days)
            ->count();

        $data['smsCreditsLast7DaysCount'] = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'sms')
            ->whereNotNull('sent_date')
            ->where('sent_date', '>=', $last7Days)
            ->sum('reminders.credits');

        $data['smsCreditsLast30DaysCount'] = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'sms')
            ->whereNotNull('sent_date')
            ->where('sent_date', '>=', $last30Days)
            ->sum('reminders.credits');

        return view('dashboard/index', $data);
    }
}
