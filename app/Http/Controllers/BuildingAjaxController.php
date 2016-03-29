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
            ->select('tblFloor.intFloorId', 'tblFloor.intFloorDesc')
            ->where('tblBuilding.intBuildingId', $request->buildingId)
            ->get();

        return response()->json($floors);
   }
}
