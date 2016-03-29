<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FloorAjaxController extends Controller
{
    public function retrieveRooms(Request $request)
    {
         $rooms = \DB::table('tblFloor')
            ->join('tblRoom', 'tblRoom.intFloorIdFK', '=', 'tblFloor.intFloorId')
            ->select('tblRoom.intRoomId')
            ->where('tblFloor.intFloorId', $request->floorId)
            ->get();

        return response()->json($rooms);
   }
}
