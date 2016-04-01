<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PatientModel;
use App\AdmissionModel;
use App\ServiceModel;
use App\ItemModel;

class CheckupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('transaction-checkup'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = \DB::table('tblPatient')
            ->leftJoin('tblAdmission', 'tblAdmission.intPatientIdFK', '=', 'tblPatient.intPatientId')
            ->leftJoin('tblBed', 'tblBed.intBedId', '=', 'tblAdmission.intBedIdFK')
            ->leftJoin('tblRoom', 'tblRoom.intRoomId', '=', 'tblBed.intRoomIdFK')
            ->select('tblPatient.intPatientId', 'tblPatient.strFirstName', 'tblPatient.txtPatientImgPath', 'tblPatient.strMiddleName', 'tblPatient.strLastName',
                'tblRoom.intRoomId', 'tblPatient.txtAddress', 'tblBed.intBedId')
            ->where('tblPatient.intPatientId', $id)
            ->first();

        $lastVisit = AdmissionModel::where('intPatientIdFK', $id)
            ->orderBy('created_at', 'desc')
            ->select('created_at')
            ->where('intPatientIdFK', $id)
            ->first();

        $services = ServiceModel::where('intServiceStatus', '>', 0)
            ->select('intServiceId', 'strServiceName')
            ->get();

        $items = \DB::table('tblItem')
            ->join('tblItemCategory', 'tblItemCategory.intItemCategoryId', '=', 'tblItem.intItemCategoryIdFK')
            ->where('tblItem.intItemStatus', '>', 0)
            ->where('tblItemCategory.strItemCategoryDesc', 'like', '%Medicine%')
            ->get();

        return view('transaction-checkup')
            ->with('patient', $patient)
            ->with('lastVisit', $lastVisit)
            ->with('services', $services)
            ->with('items', $items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
