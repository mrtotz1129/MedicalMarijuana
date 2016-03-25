<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EmployeeRequest;

use App\PositionModel;
use App\EmployeeModel;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions     =    PositionModel::all();
        $employees     =    \DB::table('tblEmployee')
            ->join('tblEmployeeType', 'tblEmployeeType.intEmployeeTypeId', '='
                , 'tblEmployee.intEmployeeTypeIdFK')
            ->select('tblEmployee.intEmployeeId', 'tblEmployeeType.strPosition',
                'tblEmployee.strFirstName', 'tblEmployee.strMiddleName',
                'tblEmployee.strLastName', 'tblEmployee.strAddress', 
                'tblEmployee.strContactNum')
            ->get();      

        return view('maintenance-employee')
            ->with('employees', $employees)
            ->with('positions', $positions);
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
    public function store(EmployeeRequest $request)
    {
        $this->saveEmployee($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = EmployeeModel::find($id);

        return response()->json($employee);
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
        $employee               =   EmployeeModel::find($id);

        $employee->intStatus    =   0;

        $employee->save();
    }

    public function updateEmployee(EmployeeRequest $request) 
    {
        $this->saveEmployee($request);
    }

    function saveEmployee(Request $request) {
        $employee       =   new EmployeeModel;
        $hasFile        =   false;
        $imageDir       =   'uploaded_images/employee';
        $firstName      =   $request->input('strFirstName'); 
        $middleName     =   $request->input('strMiddleName');  
        $lastName       =   $request->input('strLastName');
        $fileName       =   $lastName . ', ' . $firstName . ' ' . $middleName;

        if($request->hasFile('fileUpload')) {
            $hasFile = true;
            $request->file('fileUpload')->move(public_path() . '/' . $imageDir, 
                trim($fileName));
        }              

        $employee->txtImagePath         =   ($hasFile) ? $imageDir . '/' . $fileName : null;
        $employee->strFirstName         =   $firstName;
        $employee->strMiddleName        =   $middleName;
        $employee->strLastName          =   $lastName;
        $employee->dateBirthday         =   $request->input('strBirthdate');
        $employee->strGender            =   ($request->input('strEmpGender') != null) ? $request->input('strEmpGender')
            : null;
        $employee->strContactNum        =   $request->input('strEmpContactNo');
        $employee->strEmail             =   $request->input('strEmpEmail');
        $employee->strAddress           =   $request->input('strEmpAddress');
        $employee->intEmployeeTypeIdFK  =   $request->input('selectedJob');
        $employee->intStatus            =   1;

        $employee->save();

        return redirect('employee');
    }
}
