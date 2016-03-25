<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('maintenance-employee');
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
        $employee       =   new Employee;
        $hasFile        =   false;
        $imageDir       =   'uploaded_images/employee';
        $firstName      =   $request->input('strFirstName'); 
        $middleName     =   $request->input('strMiddleName');  
        $lastName       =   $request->input('strLastName');
        $fileName       =   $lastName . ', ' . $firstName . ' ' . $middleName;

        if($request->hasFile('fileUpload')) {
            $hasFile = true;
            $request->file('fileUpload')->move(public_path() . '/' . $imageDir, 
                $fileName);
        }              

        $employee->txtImagePath         =   $imageDir . '/' . $fileName;
        $employee->strFirstName         =   $firstname;
        $employee->strMiddleName        =   $middleName;
        $employee->strLastName          =   $lastName;
        $employee->dateBirthday         =   $request->input('strBirthdate');
        $employee->strGender            =   $request->input('strEmpGender');
        $employee->strContactNum        =   $request->input('strEmpContactNo');
        $employee->strEmail             =   $request->input('strEmpEmail');
        $employee->strAddress           =   $request->input('strEmpAddress');
        $employee->intEmployeeTypeIdFK  =   $request->input('selectedJob');
        $employee->intStatus            =   1;

        $employee->save();
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
