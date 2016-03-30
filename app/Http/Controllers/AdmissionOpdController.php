<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdmissionOpdRequest;
use App\Http\Controllers\Controller;

use App\PatientModel;

class AdmissionOpdController extends Controller
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
    public function store(AdmissionOpdRequest $request)
    {
         $imagePath = 'uploaded_images/patient';
        $patient = new PatientModel;

        $patient->blnIsAdmitted         =   false;
        $patient->strFirstName          =   $request->strFirstName;
        $patient->strMiddleName         =   $request->strMiddleName != null ? $request->strMiddleName : null;
        $patient->strLastName           =   $request->strLastName;
        $patient->strMachinePatientId   =   null;
        $patient->strGender             =   $request->strGender;
        $patient->dateBirthday          =   $request->strBirthdate;
        $patient->txtAddress            =   $request->strAddress;
        $patient->strEmail              =   $request->strEmail;
        $patient->strContactNumber      =   $request->strContactNumber;
        $patient->intStatus             =   1;

        if($request->hasFile('image'))
        {
            $fileName = $request->strLastName . ', ' . $request->strFirstName . ($request->strMiddleName != null ? (' ' . $request->strMiddleName) : '');

            $request->file('image')->move(public_path() . '/' . $imagePath, $fileName);
            
            $patient->txtPatientImgPath = $imagePath . '/' . $fileName;
        }

        $patient->save();


        $admission = new AdmissionModel;

        $admission->intPatientIdFK          =   $patient->intPatientId;
        $admission->intBedIdFK              =   $request->bed;
        $admission->intAdmissionStatusIdFK  =   1;
        $admission->intDoctorIdFK           =   $request->doctorSelect;

        $admission->save();

        $bed = BedModel::find($request->bed);

        $bed->intBedStatus  =   2;

        $bed->save();

        return redirect('admission');
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
