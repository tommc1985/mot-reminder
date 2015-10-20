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
        return view('mots/index', ['mots'=>$mots])
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

        $messages = \App\Message::orderBy('type', 'asc')
            ->orderBy('threshold', 'asc')
            ->get();

        $reminders = \App\Message::where('enabled', 1)->lists('id', 'description')->toArray();

        // load the create form (app/views/mots/create.blade.php)
        return view('mots/create', ['mot'=>$mot,'messages'=>$messages,'reminders'=>$reminders]);
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

        $mot->first_name = $request->input('first_name');
        $mot->last_name = $request->input('last_name');
        $mot->phone_number = $request->input('phone_number');
        $mot->email = $request->input('email');
        $mot->vehicle_make = $request->input('vehicle_make');
        $mot->vehicle_reg = strtoupper($request->input('vehicle_reg'));
        $mot->comments = $request->input('comments');
        $mot->mot_date = $request->input('mot_date');
        $mot->expiry_date = $request->input('expiry_date') ? $request->input('expiry_date') : NULL;
        $mot->save();
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
        try{
            $mot = \App\Mot::findOrFail($id);
        }catch(\ModelNotFoundException $e){
            \App::abort(404);
        }

        $messages = \App\Message::orderBy('type', 'asc')
            ->orderBy('threshold', 'asc')
            ->get();

        $reminders = \App\Reminder::where('mot_id', $mot->id)->lists('message_id', 'id')->toArray();

        return view('mots/edit', ['mot'=>$mot,'messages'=>$messages,'reminders'=>$reminders]);
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

        $mot->first_name = $request->input('first_name');
        $mot->last_name = $request->input('last_name');
        $mot->phone_number = $request->input('phone_number');
        $mot->email = $request->input('email');
        $mot->vehicle_make = $request->input('vehicle_make');
        $mot->vehicle_reg = strtoupper($request->input('vehicle_reg'));
        $mot->comments = $request->input('comments');
        $mot->mot_date = $request->input('mot_date');
        $mot->expiry_date = $request->input('expiry_date') ? $request->input('expiry_date') : NULL;
        $mot->save();
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

    /**
     * Display a search listings of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $request = \Illuminate\Http\Request::capture();
        $s = $request->get('s');

        $s = str_replace('*', '', $s);
        if (!$s)
            return redirect()->route('mots.index');

        $searchText = str_replace(' ', '* ', $s) . '*';
        $mots = \App\Mot::whereRaw("MATCH(first_name, last_name, phone_number, email, vehicle_make, vehicle_reg, comments) AGAINST (? IN BOOLEAN MODE)", [$searchText])->get();

        // load the view and pass the Mots
        return view('mots/index', ['mots'=>$mots,'s'=>$s])
            ->with('mots', $mots);
    }
}
