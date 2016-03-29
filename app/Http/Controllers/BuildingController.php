<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BuildingRequest;
use App\Http\Controllers\Controller;

use App\BuildingModel;
use App\FloorModel;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = BuildingModel::where('intBuildingStatus', '>', 0)
            ->get();

        return view('maintenance-building')
            ->with('buildings', $buildings);
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
    public function store(BuildingRequest $request)
    {
        $building = new BuildingModel;

        $building->strBuildingName      =   $request->strBuildingName;
        $building->strBuildingLocation  =   $request->strBuildingLocation;
        $building->txtBuildingDesc      =   $request->txtBuildingDesc;
        $building->intBuildingStatus    =   1;

        $building->save();

        $floor = new FloorModel;

        $floor->intBuildingIdFK =   $building->intBuildingId;
        $floor->intFloorDesc    =   $request->intFloorDesc;

        $floor->save();

        return redirect('building');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $building = \DB::table('tblBuilding')
            ->join('tblFloor', 'tblBuilding.intBuildingId', '=', 'tblFloor.intBuildingIdFK')
            ->select('tblBuilding.intBuildingId', 'tblBuilding.strBuildingName', 'tblBuilding.strBuildingLocation', 'tblBuilding.txtBuildingDesc', 'tblFloor.intFloorDesc')
            ->where('tblBuilding.intBuildingId', $id)
            ->first();

        return response()->json($building);
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
        $building = BuildingModel::find($id);

        $building->strBuildingName      =   $request->buildingName;
        $building->strBuildingLocation  =   $request->buildingLocation;
        $building->txtBuildingDesc      =   $request->buildingDesc;

        $building->save();

        $floor = FloorModel::where('intBuildingIdFK', $id)
            ->first();

        $floor->intFloorDesc    =   $request->floorNumber;

        $floor->save();   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $building = BuildingModel::find($id);

        $building->intBuildingStatus = 0;

        $building->save();
    }
}
