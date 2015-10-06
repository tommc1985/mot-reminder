<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Mot extends Controller
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
        // get all the Mots
        $mots = \App\Mot::orderBy('mot_date', 'desc')
            ->orderBy('last_name', 'asc')
            ->orderBy('first_name', 'asc')
            ->get();

        // load the view and pass the Mots
        return view('mots/index')
            ->with('mots', $mots);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mot = new \App\Mot();
        $mot->mot_date = date('Y-m-d');

        $reminders = \App\Reminder::orderBy('type', 'asc')
            ->orderBy('delay_before', 'asc')
            ->get();

        $motReminders = array();

        // load the create form (app/views/mots/create.blade.php)
        return view('mots/create', ['mot'=>$mot,'reminders'=>$reminders,'motReminders'=>$motReminders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\Mot $request)
    {
        $mot = new \App\Mot();

        $data = $request->all();

        $mot->fill($data)->save();
        $mot->saveReminders($data);

        \Session::flash('flash_message', "{$mot->first_name} {$mot->last_name}'s MOT successfully added");

        return redirect()->route('mots.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        \App::abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mot = \App\Mot::findOrFail($id);

        $reminders = \App\Reminder::orderBy('type', 'asc')
            ->orderBy('delay_before', 'asc')
            ->get();

        $motReminders = \App\MotReminder::lists('reminder_id', 'id')->toArray();

        return view('mots/edit', ['mot'=>$mot,'reminders'=>$reminders,'motReminders'=>$motReminders]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\App\Http\Requests\Mot  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\Mot $request, $id)
    {
        $mot = \App\Mot::findOrFail($id);

        $data = $request->all();

        $mot->fill($data)->save();
        $mot->saveReminders($data);

        \Session::flash('flash_message', "{$mot->first_name} {$mot->last_name}'s MOT successfully updated");

        return redirect()->route('mots.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mot = Player::findOrFail($id);

        $mot->delete();

        \Session::flash('flash_message', "{$mot->first_name} {$mot->last_name}'s MOT successfully deleted");

        return redirect()->route('mots.index');
    }
}
