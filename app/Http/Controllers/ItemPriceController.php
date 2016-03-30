<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ItemPriceModel;
use App\UOMModel;

class ItemPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $itemPrice = new ItemPriceModel;
        $itemPrice->intItemIdFK = $request->intItemId;
        $itemPrice->deciItemPrice = $request->dblPrice;
        $itemPrice->intUnitOfMeasurementIdFK = $request->intMeasurementId;
        $itemPrice->save();

        return redirect('item');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    public function getPrice(Request $request){
        $itemPrice = ItemPriceModel::where('intItemIdFK', $request->intItemId)
            ->where('intUnitOfMeasurementIdFK', $request->intMeasurementId)
            ->orderBy('created_at', 'desc')
            ->first();
        $measurement = UOMModel::find($request->intMeasurementId);
        $itemPrice->measurement = $measurement->strUnitOfMeasurementAbbrev;
        return response()->json($itemPrice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
