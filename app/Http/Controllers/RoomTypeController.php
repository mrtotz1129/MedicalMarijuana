<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RoomTypeModel;

class RoomTypeController extends Controller
{
    public function createRoomType(Request $request)
    {
        $roomType = new RoomTypeModel;

        $roomType->strRoomTypeDesc  =   $request->roomTypeName;

        $roomType->save();

        return response()->json($roomType);
    }
}
