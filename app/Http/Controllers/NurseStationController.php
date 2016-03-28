<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BuildingModel;
use App\EmployeeModel;

class NurseStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildingList = BuildingModel::where('intBuildingStatus', '>', 0)
            ->get();
        $nurseId = \DB::table('tblEmployeeType')
            ->where('strPosition', 'like', '%Nurse%')
            ->select('intEmployeeTypeId')
            ->first();
        $nurses = EmployeeModel::where('intEmployeeTypeIdFK', $nurseId->intEmployeeTypeId)
            ->select('intEmployeeId', 'strFirstName', 'strMiddleName', 'strLastName')
            ->get();

        return view('maintenance-nurse-station')
            ->with('buildingList', $buildingList)
            ->with('nurses', $nurses);
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
