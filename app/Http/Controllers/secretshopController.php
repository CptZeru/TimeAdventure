<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\secretshopModel;

class secretshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = secretshopModel::all();
        return view('secretshop.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secretshop.create');
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
			'item_name'=>'required',
			'item_price'=>'required'
		]);
		$item = new secretshopModel([
			'item_name'=>$request->get('item_name'),
			'price'=>$request->get('item_price')
		]);
		$item->save();
		return redirect('/secretshop')->with('success','Item has been Added');
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
        $item = secretshopModel::find($id);
		
		return view('secretshop.edit', compact('item'));
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
			'item_name'=>'required',
			'item_price'=>'required'
		]);
		$item = secretshopModel::find($id);
		$item->item_name=$request->get('item_name');
		$item->price=$request->get('item_price');
		$item->save();
		
		return redirect('/secretshop')->with('success','Item has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = secretshopModel::find($id);
		$item->delete();
		
		return redirect('/secretshop')->with('success', 'Item has been deleted Successfully');
    }
}
