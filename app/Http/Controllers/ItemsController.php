<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ItemCategoryModel;
use App\ItemModel;
use App\GenericModel;
use App\UOMModel;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemList = ItemModel::all()
                        ->where('intItemStatus', 1);
        foreach ($itemList as $item) {
            $itemCategory = ItemCategoryModel::find($item->intItemCategoryIdFK);
            $item->item_category = $itemCategory->strItemCategoryDesc;
            if ($itemCategory->strItemCategoryDesc == "Medicine"){
                $generic = GenericModel::find($item->intGenericNameIdFK);
                $item->generic_name = $generic->strGenericName;
            }
        }
        $itemCategoryList = ItemCategoryModel::all();
        $genericList = GenericModel::all();
        $measurementList = UOMModel::all()
                                ->where('intStatus', 1);
        return view('maintenance-items')
                ->with('itemCategoryList', $itemCategoryList)
                ->with('genericList', $genericList)
                ->with('itemList', $itemList)
                ->with('measurementList', $measurementList);
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
        $imagePath = 'uploaded_images/employee';
        $item = new ItemModel;
        $item->strItemName = $request->strItemName;
        if ($request->strItemCategoryDesc == "Medicine"){
            $item->intGenericNameIdFK = $request->intGenericNameId;
        }
        $itemCategory = ItemCategoryModel::where('strItemCategoryDesc', $request->strItemCategoryDesc)
                            ->first();
        $item->intItemCategoryIdFK = $itemCategory->intItemCategoryId;
        $item->intGenericNameIdFK = $request->intGenericNameId;
        $item->intItemStatus = 1;

        if($request->hasFile('image'))
        {
            $request->file('image')->move(public_path() . '/' . $imagePath, $item->strItemName);

            $item->
        }

        $item->save();
        
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
