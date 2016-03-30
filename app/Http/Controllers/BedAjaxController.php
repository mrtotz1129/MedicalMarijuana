<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BedAjaxController extends Controller
{
   public function retrieveBeds($id)
   {
        $beds = \DB::table('tblRoom')
            ->join('tblBed', 'tblBed.intRoomIdFK', '=', 'tblRoom.intRoomId')
            ->select('tblBed.intBedId')
            ->where('tblRoom.intRoomId', $id)
            ->where('tblBed.intBedStatus', 1)
            ->get();

        return response()->json($beds);
   }
}
