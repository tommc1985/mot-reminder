<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Reminder extends Controller
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
        // get all the Reminders
        $reminders = \App\Reminder::orderBy('type', 'asc')
            ->orderBy('delay_before', 'asc')
            ->get();

        // load the view and pass the Reminders
        return view('reminders/index')
            ->with('reminders', $reminders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reminder = new \App\Reminder();

        // load the create form (app/views/reminders/create.blade.php)
        return view('reminders/create', ['reminder'=>$reminder]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\Reminder $request)
    {
        $reminder = new \App\Reminder();

        $data = $request->all();

        $reminder->fill($data);
        $reminder->enabled = $request->input('enabled', 0);
        $reminder->save();

        \Session::flash('flash_message', "\"{$reminder->description}\" reminder successfully added");

        return redirect()->route('reminders.index');
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
        $reminder = \App\Reminder::findOrFail($id);

        return view('reminders/edit')
            ->with('reminder', $reminder);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\App\Http\Requests\Reminder  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\Reminder $request, $id)
    {
        $reminder = \App\Reminder::findOrFail($id);

        $data = $request->all();

        $reminder->fill($data);
        $reminder->enabled = $request->input('enabled', 0);
        $reminder->save();

        \Session::flash('flash_message', "\"{$reminder->description}\" reminder successfully updated");

        return redirect()->route('reminders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App::abort(404);
    }
}
