<?php

namespace App\Http\Controllers;

use App\shopping;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('list.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'newShoppinglistName' => 'required|min:5|max:225',
        ]);

        $list = new shopping;

        $list->name = $request->newShoppinglistName;
        $list->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function show(shopping $shopping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function edit(shopping $shopping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shopping $shopping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function destroy(shopping $shopping)
    {
        //
    }
}
