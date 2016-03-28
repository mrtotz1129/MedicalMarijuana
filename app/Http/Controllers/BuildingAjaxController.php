<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BuildingModel;

class BuildingAjaxController extends Controller
{
   function retrieveFloors(Request $request)
   {
        $floors = \DB::table('tblFloor')
            ->join('tblBuilding', 'tblBuilding.intBuildingId', '=', 'tblFloor.intBuildingIdFK')
            ->select('tblFloor.intFloorDesc')
            ->where('tblBuilding.intBuildingId', $request->buildingId)
            ->first();

        return response()->json($floors);
   }
}
