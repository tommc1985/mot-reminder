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
        // load the create form (app/views/mots/create.blade.php)
        return view('mots/create');
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

        $data = array(
            'image_id' => 1,
        ) + $request->all();

        $mot->fill($data)->save();

        \Session::flash('flash_message', "{$mot->first_name} {$mot->last_name}'s Mot successfully added");

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

        return view('mots/edit')
            ->with('mot', $mot);
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

        $mot->fill($data)->Save();

        \Session::flash('flash_message', "{$mot->first_name} {$mot->last_name}'s Mot successfully updated");

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

        \Session::flash('flash_message', "{$mot->first_name} {$mot->last_name}'s Mot successfully deleted");

        return redirect()->route('mots.index');
    }
}
