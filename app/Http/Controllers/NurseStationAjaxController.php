<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FloorModel;

class NurseStationAjaxController extends Controller
{
    public function retrieveNurse(Request $request) 
    {
        $nurse = \DB::table('tblNurseStation')
            ->join('tblNurseStationDetail', 'tblNurseStationDetail.intNurseStationIdFK', '=', 'tblNurseStation.intNurseStationId')
            ->join('tblEmployee', 'tblEmployee.intEmployeeId', '=', 'tblNurseStationDetail.intNurseIdFK')
            ->select('tblEmployee.strFirstName', 'tblEmployee.strMiddleName', 'tblEmployee.strLastName')
            ->where('tblNurseStation.intNurseStationId', $request->nurseStationId)
            ->first();

        return response()->json($nurse);
    }
}
