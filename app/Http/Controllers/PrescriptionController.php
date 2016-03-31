<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PrescriptionRequest;
use App\Http\Controllers\Controller;

use App\PrescriptionModel;
use App\PrescriptionDetailModel;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Forbidden';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'Forbidden';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrescriptionRequest $request)
    {
        $prescription = new PrescriptionModel;

        $prescription->intPatientIdFK   =   $request->patientId;
        $prescription->intEmployeeIdFK  =   1;
        $prescription->intStatus        =   1;

        $prescription->save();

        $prescriptionDetail = new PrescriptionDetailModel;

        $prescriptionDetail->intPrescriptionIdFK    =   $prescription->intPrescriptionId;
        $prescriptionDetail->intPrescriptionTypeId  =   2;

        $prescriptionDetail->save();

        \DB::table('tblPrescriptionMedicine')
            ->insert([
                'intPrescriptionDetailIdFK' =>  $prescriptionDetail->intPrescriptionDetailId,
                'intMedicineIdFK'           =>  $request->medicineSelect,
                'intTimesADay'              =>  $request->timesDayInput,
                'timeInterval'              =>  $request->intervalInput,
                'intUnitOfMeasurementIdFK'  =>  1,
                'created_at'                =>  date('Y-m-d H:i:s'),
                'updated_at'                =>  date('Y-m-d H:i:s')
            ]);
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
