<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\playerModel;

class playerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$players = playerModel::all();
        return view('players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
			'char_name'=>'required',
			'char_role'=>'required',
			'char_clan'=>'required'
		]);
		$player = new playerModel([
			'player_name'=>$request->get('char_name'),
			'player_role'=>$request->get('char_role'),
			'player_clan'=>$request->get('char_clan')
		]);
		$player->save();
		return redirect('/players')->with('success','Player has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = playerModel::find($id);
		
		return view('players.edit', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
			'char_name'=>'required',
			'char_role'=>'required',
			'char_clan'=>'required'
		]);
		$player = playerModel::find($id);
		$player->player_name=$request->get('char_name');
		$player->player_role=$request->get('char_role');
		$player->player_clan=$request->get('char_clan');
		$player->save();
		
		return redirect('/players')->with('success','Player has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = playerModel::find($id);
		$player->delete();
		
		return redirect('/players')->with('success', 'Player has been deleted Successfully');
    }
}
