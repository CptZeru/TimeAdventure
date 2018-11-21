<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questModel;

class questController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quests = questModel::all();
        return view('quests.index', compact('quests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quests.create');
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
			'quest_name'=>'required',
			'quest_obj'=>'required',
			'quest_level'=>'required',
			'quest_reward'=>'required'
		]);
		$quest = new questModel([
			'quest_name'=>$request->get('quest_name'),
			'quest_obj'=>$request->get('quest_obj'),
			'quest_level'=>$request->get('quest_level'),
			'quest_reward'=>$request->get('quest_reward')
		]);
		$quest->save();
		return redirect('/quests')->with('success','Quest has been Added');
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
        $quest = questModel::find($id);
		
		return view('quests.edit', compact('quest'));
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
			'quest_name'=>'required',
			'quest_obj'=>'required',
			'quest_level'=>'required',
			'quest_reward'=>'required'
		]);
		$quest = questModel::find($id);
		$quest->quest_name=$request->get('quest_name');
		$quest->quest_obj=$request->get('quest_obj');
		$quest->quest_level=$request->get('quest_level');
		$quest->quest_reward=$request->get('quest_reward');
		$quest->save();
		
		return redirect('/quests')->with('success','Quest has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quest = questModel::find($id);
		$quest->delete();
		
		return redirect('/quests')->with('success', 'Quest has been deleted Successfully');
    }
}
