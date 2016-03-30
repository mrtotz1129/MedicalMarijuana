<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ExaminationRequestRequest;
use App\Http\Controllers\Controller;

use App\PrescriptionModel;
use App\PrescriptionDetailModel;

class ExaminationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(ExaminationRequestRequest $request)
    {
        $prescription = new PrescriptionModel;

        $prescription->intPatientIdFk   =   $request->patientId;
        $prescription->intEmployeeIdFk  =   1;  // Will session it later

        $prescription->save();

        $prescriptionDetail = new PrescriptionDetailModel;

        $prescriptionDetail->intPrescriptionIdFK    =   $prescription->intPrescriptionId;
        $prescriptionDetail->intPrescriptionTypeId  =   1;

        $prescriptionDetail->save();

        for($i = 0; $i < (int) count($request->service); $i++)
        {
            \DB::table('tblPrescriptionService')
            ->insert([
                'intPrescriptionDetailIdFK' =>  $prescriptionDetail->intPrescriptionDetailId,
                'intServiceIdFK'            =>  $request->service[$i],
                'created_at'                =>  date('Y-m-d H:i:s'),
                'updated_at'                =>  date('Y-m-d H:i:s'),
                'txtRemarks'                =>  $request->remarks != null ? $request->remarks : null
            ]);   
        }

        return redirect('checkup/' . $request->patientId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
