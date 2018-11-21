<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\enemy;

class enemyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enemies = enemy::all();
        return view('enemies.index', compact('enemies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enemies.create');
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
			'enemy_name'=>'required',
			'enemy_role'=>'required',
			'enemy_hp'=>'required',
			'enemy_mp'=>'required'
		]);
		$enemy = new enemy([
			'enemy_name'=>$request->get('enemy_name'),
			'enemy_role'=>$request->get('enemy_role'),
			'enemy_hp'=>$request->get('enemy_hp'),
			'enemy_mp'=>$request->get('enemy_mp')
		]);
		$enemy->save();
		return redirect('/enemies')->with('success','Enemy has been Added');
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
        $enemy = enemy::find($id);
		
		return view('enemies.edit', compact('enemy'));
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
			'enemy_name'=>'required',
			'enemy_role'=>'required',
			'enemy_hp'=>'required',
			'enemy_mp'=>'required'
		]);
		$enemy = enemy::find($id);
		$enemy->enemy_name=$request->get('enemy_name');
		$enemy->enemy_role=$request->get('enemy_role');
		$enemy->enemy_hp=$request->get('enemy_hp');
		$enemy->enemy_mp=$request->get('enemy_mp');
		$enemy->save();
		
		return redirect('/enemies')->with('success','Enemy has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enemy = enemy::find($id);
		$enemy->delete();
		
		return redirect('/enemies')->with('success', 'Enemy has been deleted Successfully');
    }
}
