<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdmissionRequest;
use App\Http\Controllers\Controller;

use App\RoomTypeModel;
use App\EmployeeModel;
use App\AdmissionModel;
use App\PatientModel;
use App\BedModel;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomTypes = RoomTypeModel::all();

        $doctors = \DB::table('tblEmployee')
            ->join('tblEmployeeType', 'tblEmployeeType.intEmployeeTypeId', '=', 'tblEmployee.intEmployeeTypeIdFK')
            ->select('tblEmployee.intEmployeeId', 'tblEmployee.strFirstName', 'tblEmployee.strMiddleName', 'tblEmployee.strLastName')
            ->where('tblEmployeeType.strPosition','like', '%Doctor%')
            ->get();

        $patients = \DB::table('tblPatient')
            ->leftJoin('tblAdmission', 'tblAdmission.intPatientIdFK', '=', 'tblPatient.intPatientId')
            ->leftJoin('tblBed', 'tblBed.intBedId', '=', 'tblAdmission.intBedIdFK')
            ->leftJoin('tblRoom', 'tblRoom.intRoomId', '=', 'tblBed.intRoomIdFK')
            ->select('tblPatient.intPatientId', 'tblPatient.strFirstName', 'tblPatient.strMiddleName', 'tblPatient.strLastName', 'tblPatient.txtAddress', 'tblPatient.strContactNumber', 'tblRoom.intRoomId', 'tblBed.intBedId')
            ->where('tblPatient.intStatus', '>', 0)
            ->get();

        return view('transaction-admission')
            ->with('roomTypes', $roomTypes)
            ->with('doctors', $doctors)
            ->with('patients', $patients);
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
    public function store(AdmissionRequest $request)
    {
        // $imagePath = 'uploaded_images/patient';
        // $patient = new PatientModel;

        // $patient->blnIsAdmitted         =   $request->patientType == 'in' ? true : false;
        // $patient->strFirstName          =   $request->strFirstName;
        // $patient->strMiddleName         =   $request->strMiddleName != null ? $request->strMiddleName : null;
        // $patient->strLastName           =   $request->strLastName;
        // $patient->strMachinePatientId   =   null;
        // $patient->strGender             =   $request->strGender;
        // $patient->dateBirthday          =   $request->strBirthdate;
        // $patient->txtAddress            =   $request->strAddress;
        // $patient->strEmail              =   $request->strEmail;
        // $patient->strContactNumber      =   $request->strContactNumber;
        // $patient->intStatus             =   1;

        // if($request->hasFile('image'))
        // {
        //     $fileName = $request->strLastName . ', ' . $request->strFirstName . ($request->strMiddleName != null ? (' ' . $request->strMiddleName) : '');

        //     $request->file('image')->move(public_path() . '/' . $imagePath, $fileName);
            
        //     $patient->txtPatientImgPath = $imagePath . '/' . $fileName;
        // }

        // $patient->save();


        $admission = new AdmissionModel;

        $admission->intPatientIdFK          =   $request->intPatientId;
        $admission->intBedIdFK              =   $request->intBedId;
        $admission->intAdmissionStatusIdFK  =   1;
        $admission->intDoctorIdFK           =   $request->intDoctorId;

        $admission->save(); 

        $bed = BedModel::find($request->intBedId);

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
