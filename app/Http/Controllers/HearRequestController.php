<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PrescriptionModel;

class HearRequestController extends Controller
{
    public function medicalRequest($id)
    {
        $recentRequest = PrescriptionModel::where('intStatus', '>', 0)
            ->orderBy('intPrescriptionId', 'desc')
            ->select('intPrescriptionId')
            ->first();

        if($id == $recentRequest->intPrescriptionId)
        {
            return response()->json(false, $recentRequest->intPrescriptionId);
        }
        else 
        {
            $pendingRequests = \DB::table('tblPrescription')
            ->join('tblPatient', 'tblPatient.intPatientId', '=', 'tblPrescription.intPatientIdFK')
            ->join('tblEmployee', 'tblEmployee.intEmployeeId', '=', 'tblPrescription.intEmployeeIdFK')
            ->select('tblPrescription.intPrescriptionId', 'tblPatient.strFirstName', 'tblPatient.strMiddleName', 'tblPatient.strLastName', 'tblEmployee.strFirstName as strEmployeeFirstName', 'tblEmployee.strMiddleName as strEmployeeMiddleName', 'tblEmployee.strLastName as strEmployeeLastName')
            ->orderBy('tblPrescription.intPrescriptionId', 'desc')
            ->first();

            return response()->json([true, $pendingRequests->intPrescriptionId, $pendingRequests]);
        }
    }
}
