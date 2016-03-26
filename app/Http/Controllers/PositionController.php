<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PositionModel;

class PositionController extends Controller
{
    public function createPosition(Request $request) {
        $position = new PositionModel;

        $position->strPosition  =   $request->input('position');
        $position->intStatus    =   1;

        $position->save();

        return response()->json($position);
    }
}
