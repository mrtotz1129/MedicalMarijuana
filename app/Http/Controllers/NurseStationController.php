<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BuildingModel;
use App\EmployeeModel;
use App\NurseStationModel;
use App\FloorModel;

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

        $nurseStations = \DB::table('tblNurseStation')
            ->join('tblFloor', 'tblFloor.intFloorId', '=', 'tblNurseStation.intFloorIdFK')
            ->join('tblBuilding', 'tblBuilding.intBuildingId', '=', 'tblFloor.intBuildingIdFK')
            ->leftJoin('tblNurseStationDetail', 'tblNurseStationDetail.intNurseStationIdFK', '=', 'tblNurseStation.intNurseStationId')
            ->distinct()
            // ->join('tblEmployee', 'tblNurseStationDetail.intNurseIdFK', '=', 'tblEmployee.intEmployeeId')
            ->select('tblNurseStation.intNurseStationId', 'tblBuilding.strBuildingName', 'tblFloor.intFloorDesc')
            ->where('tblNurseStation.intNurseStationStatus', '>', 0)
            ->groupBy('tblNurseStation.intNurseStationId')
            ->get();

        return view('maintenance-nurse-station')
            ->with('buildingList', $buildingList)
            ->with('nurses', $nurses)
            ->with('nurseStations', $nurseStations);
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

        $nurseStation->intFloorIdFK             =   $request->floorCreateSelect;
        $nurseStation->intNurseStationStatus    =   1;

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
        $details = \DB::table('tblNurseStation')
            ->join('tblFloor', 'tblFloor.intFloorId', '=', 'tblNurseStation.intFloorIdFK')
            ->join('tblBuilding', 'tblBuilding.intBuildingId', '=', 'tblFloor.intBuildingIdFK')
            ->where('tblNurseStation.intNurseStationId', $id)
            ->first();

        $floors = FloorModel::where('intBuildingIdFK', $details->intBuildingId)
            ->get();

        $nurses = \DB::table('tblNurseStationDetail')
            ->where('intNurseStationIdFK', $id)
            ->where('intNurseStatus', '>', 0)
            ->get();

        return response()->json([$details, $floors, $nurses]);
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
        $arrForm = [];
        parse_str($request->formData, $arrForm);

        $nurseStation = NurseStationModel::find($id);

        $nurseStation->intFloorIdFK =   $arrForm['floorUpdateSelect'];

        $nurseStation->save();

        if(isset($arrForm['nurseUpdateSelect'])) {
            $nurse = \DB::table('tblNurseStationDetail')
                    ->where('intNurseStationIdFK', $id)
                    ->first();

            if(count($nurse) > 0) {
                \DB::table('tblNurseStationDetail')
                       ->where('intNurseStationIdFK', $id)
                       ->delete();
            } else {
                for($i = 0; $i < count($arrForm['nurseUpdateSelect']); $i++) {
                    \DB::table('tblNurseStationDetail')
                        ->insert([
                            'intNurseStationIdFK'   =>  $id,
                            'intNurseIdFK'          =>  $arrForm['nurseUpdateSelect'][$i],
                            'intNurseStatus'        =>  1
                        ]);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nurseStation = NurseStationModel::find($id);

        $nurseStation->intNurseStationStatus    =   0;

        $nurseStation->save();
    }
}
