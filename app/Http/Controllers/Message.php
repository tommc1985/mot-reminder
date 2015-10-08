<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Message extends Controller
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
        // get all the Messages
        $messages = \App\Message::orderBy('type', 'asc')
            ->orderBy('threshold', 'asc')
            ->get();

        // load the view and pass the Messages
        return view('messages/index')
            ->with('messages', $messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = new \App\Message();

        // load the create form (app/views/messages/create.blade.php)
        return view('messages/create', ['message'=>$message]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\Message $request)
    {
        $message = new \App\Message();

        $data = $request->all();

        $message->fill($data);
        $message->enabled = $request->input('enabled', 0);
        $message->save();

        \Session::flash('flash_message', "\"{$message->description}\" message successfully added");

        return redirect()->route('messages.index');
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
        $message = \App\Message::findOrFail($id);

        return view('messages/edit')
            ->with('message', $message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\App\Http\Requests\Message  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\Message $request, $id)
    {
        $message = \App\Message::findOrFail($id);

        $data = $request->all();

        $message->fill($data);
        $message->enabled = $request->input('enabled', 0);
        $message->save();

        \Session::flash('flash_message', "\"{$message->description}\" message successfully updated");

        return redirect()->route('messages.index');
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
