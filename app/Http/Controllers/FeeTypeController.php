<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FeeTypeModel;

class FeeTypeController extends Controller
{
    public function createFeeType(Request $request)
    {
        $feeType = new FeeTypeModel;

        $feeType->strFeeTypeName    =   $request->input('feeTypeName');
        $feeType->intStatus         =   1;

        $feeType->save();

        return response()->json($feeType);
    }
}
