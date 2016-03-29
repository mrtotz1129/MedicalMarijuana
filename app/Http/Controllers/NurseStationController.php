<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BuildingModel;
use App\EmployeeModel;
use App\NurseStationModel;

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

        $nurseStations = NurseStationModel;

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
        $nurseStation = new NurseStationModel;

        $nurseStation->intFloorIdFK     =   $request->floorCreateSelect;
        $nurseStation->intFloorStatus   =   1;

        $nurseStation->save();

        if($request->nurses != null) {
            for($i = 0; $i < count($request->nurses); $i++) {
                \DB::table('tblNurseStationDetail')
                    ->insert([
                        'intNurseStationIdFk'   =>  $nurseStation->intNurseStationId,
                        'intNurseIdFk'          =>  $request->nurses[$i],
                        'intNurseStatus'        =>  1
                    ]);   
            }
        }

        return redirect('nurse-station');
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
