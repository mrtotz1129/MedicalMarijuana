<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ItemModel;

class ItemsAjaxController extends Controller
{
   public function itemUpdate(Request $request)
   {
        $imagePath = 'uploaded_images/item';
        $item = ItemModel::find($request->itemId);

        $item->strItemName = $request->strItemName;
        $item->intItemCategoryIdFK  =   $request->strItemCategoryDesc;
        $item->intGenericNameIdFK   =   $request->intGenericNameId;

        if($request->hasFile('image'))
        {
            $request->file('image')->move(public_path() . '/' . $imagePath, $request->strItemName);

            $item->txtImagePath = $imagePath . '/' . $request->strItemName;
        }
        else 
        {
            $item->txtImagePath = null;
        }

        $item->save();

        return redirect('item');
   }
}
