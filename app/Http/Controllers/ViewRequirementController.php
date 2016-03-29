<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RequirementModel;
use App\DiscountModel;

class ViewRequirementController extends Controller
{
    public function viewAllRequirement(Request $request){

        $requirementList = \DB::table('tblDiscount')
                                ->join('tblDiscountDetail', 'tblDiscount.intDiscountId', '=', 'tblDiscountDetail.intDiscountIdFK')
                                ->join('tblRequirement', 'tblRequirement.intRequirementId', '=', 'tblDiscountDetail.intRequirementIdFK')
                                ->select('tblRequirement.*')
                                ->get();
        return response()->json($requirementList);

    }
}
