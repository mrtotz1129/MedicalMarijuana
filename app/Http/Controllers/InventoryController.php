<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UOMModel;
use App\ItemModel;
use App\InventoryModel;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measurementList = UOMModel::where('intStatus', 1)
            ->get();
        $itemList = ItemModel::where('intItemStatus', 1)
            ->get();
        foreach ($itemList as $item) {
            $inventory = InventoryModel::where('intItemIdFK', $item->intItemId)
                ->orderBy('created_at', 'desc')
                ->first();
            if ($inventory != null){
                $item->inventory = $inventory->deciAfterValue;
            }else{
                $item->inventory = 0;
            }
        }
        return view('transaction-inventory')
            ->with('measurementList', $measurementList)
            ->with('itemList', $itemList);
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
        $inventoryPrev = InventoryModel::where('intItemIdFK', $request->intItemId)
            ->orderBy('created_at', 'desc')
            ->first();
        $measurement = UOMModel::find($request->intMeasurementId);
        $inventory = new InventoryModel;
        $inventory->intItemIdFK = $request->intItemId;
        if ($inventoryPrev == null){
            $inventoryPrevValue = 0;
        }else{
            $inventoryPrevValue = $inventoryPrev->deciAfterValue;
        }
        $inventory->deciPrevValue = $inventoryPrevValue;
        $newInventory = $inventoryPrevValue+($request->dblQuantity*$measurement->dblEquivalent);
        $inventory->deciAfterValue = $newInventory;
        $inventory->strReason = "add";
        $inventory->save();
        return redirect('inventory');
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
