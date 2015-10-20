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
        $next7Days = date('Y-m-d', time() + (86400 * 7));

        // MOTs
        $motsCount = \DB::table('mots')
            ->count();

        $motsExpiringCount = \DB::table('mots')
            ->where('expiry_date', '>', $now)
            ->count();

        // All Reminders
        $remindersCount = \DB::table('reminders')
            ->count();

        $sentRemindersCount = \DB::table('reminders')
            ->whereNotNull('sent_date')
            ->count();

        // Email Reminders
        $emailRemindersCount = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'email')
            ->count();

        $sentEmailRemindersCount = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'email')
            ->whereNotNull('sent_date')
            ->count();

        $sentEmailRemindersLast7Days = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'email')
            ->whereNotNull('sent_date')
            ->where('sent_date', '>', $last7Days)
            ->count();

        $sentEmailRemindersLast30Days = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'email')
            ->whereNotNull('sent_date')
            ->where('sent_date', '>', $last30Days)
            ->count();

        // SMS Reminders
        $smsRemindersCount = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'sms')
            ->count();

        $sentSmsRemindersCount = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'sms')
            ->whereNotNull('sent_date')
            ->count();

        $sentSmsRemindersLast7Days = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'sms')
            ->whereNotNull('sent_date')
            ->where('sent_date', '>', $last7Days)
            ->count();

        $sentSmsRemindersLast30Days = \DB::table('reminders')
            ->select('reminders.*')
            ->join('messages', 'messages.id', '=', 'reminders.message_id')
            ->where('messages.type', 'sms')
            ->whereNotNull('sent_date')
            ->where('sent_date', '>', $last30Days)
            ->count();



        var_dump($motsCount, $motsExpiringCount, $remindersCount, $sentRemindersCount, $emailRemindersCount, $sentEmailRemindersCount, $sentEmailRemindersLast7Days, $smsRemindersCount, $sentSmsRemindersCount, $sentSmsRemindersLast7Days); die();




        return view('dashboard/index');
    }
}
