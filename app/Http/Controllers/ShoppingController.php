<?php

namespace App\Http\Controllers;

use App\shopping;
use Illuminate\Http\Request;
use Session;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list = shopping::orderBy('id','desc')->paginate(5); //paginate für die Seiten

        return view('list.index')->with('StoredLists', $list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        return $request->all();
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
            'newShoppinglistName'=>'required|min:2|max:225', //min 2 buchstaben, BSP. Ei
            'newShoppinglistNumber'=>'required|min:1|max:225',
        ]);

        $list = new shopping;

        $list->name = $request->newShoppinglistName;
        $list->anzahl = $request->newShoppinglistNumber;
        $list->save();

        Session::flash('success','Successfully add new Article' );


        return redirect()->route('shopping-list.index'); //von php artisan route:list

      //   return response()->json(['success'=>'Data is successfully added']);

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
    public function edit($id)
    {
        $list = shopping::find($id);

        return view('list.edit')->with('listUnderEdit', $list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'updatedListName' => 'required|min:2|max:255',
          'updatedListNumber' => 'required|min:1|max:255',
        ]);

        $list = shopping::find($id);

        $list->name = $request->updatedListName;
        $list->anzahl = $request->updatedListNumber;

        $list->save();

        Session::flash('success', 'Article' .' has been successfully updated.');

        return redirect()->route('shopping-list.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $list = shopping::find($id);
        $list->delete();

        /*return response()->json([
        'success' => 'Record deleted successfully!'
      ]);
*/
        Session::flash('success', 'Article' . ' has been successfully deleted');

        //return redirect()->route('shopping-list.index');


  }
}
