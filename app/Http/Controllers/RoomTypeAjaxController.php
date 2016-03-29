<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoomTypeAjaxController extends Controller
{
    public function retrieveRooms(Request $request) 
    {
        $rooms = \DB::table('tblRoomType')
        	->join('tblRoom', 'tblRoom.intRoomTypeIdFK', '=', 'tblRoomType.intRoomTypeId')
        	->select('tblRoom.intRoomId')
        	->where('tblRoomType.intRoomTypeId', $request->roomTypeId)
        	->get();

        return response()->json($rooms);
    }
}
