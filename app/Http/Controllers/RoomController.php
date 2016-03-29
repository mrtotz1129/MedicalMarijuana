<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RoomRequest;
use App\Http\Controllers\Controller;

use App\RoomTypeModel;
use App\RoomModel;
use App\NurseStationModel;
use App\BuildingModel;
use App\RoomPriceModel;
use App\BedModel;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomTypes = RoomTypeModel::all();
        $nurseStations = NurseStationModel::where('intNurseStationStatus', '>', 0)
            ->get();

        $buildings = BuildingModel::where('intBuildingStatus', '>', 0)
            ->get();

        // $rooms = \DB::table('tblRoom')
            // ->
            // ->select('tblRoom.intRoomId', 'tblRoomType.strRoomTypeDesc', 'tblRoom.txtRoomDescription', '')

        return view('maintenance-room')
            ->with('roomTypes', $roomTypes)
            ->with('nurseStations', $nurseStations)
            ->with('buildings', $buildings)
            ;
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
    public function store(RoomRequest $request)
    {
        $room = new RoomModel;

        $room->intRoomTypeIdFK      =   $request->roomTypeCreate;
        $room->intNurseStationIdFK  =   $request->nurseStationSelect != null ? $request->nurseStationSelect : null;
        $room->intFloorIdFK         =   $request->floorCreateSelect; 
        $room->intRoomStatus        =   1;  
        $room->txtRoomDescription   =   $request->txtRoomDescription != null ? $request->txtRoomDescription : null;

        $room->save();

        $roomPrice = new RoomPriceModel;

        $roomPrice->intRoomIdFK     =   $room->intRoomId;
        $roomPrice->deciRoomPrice   =   $request->dblPrice;

        $roomPrice->save();

        for($i = 0; $i < (int) $request->intNumBed; $i++)
        {
            $bed = new BedModel;
            $bed->intRoomIdFK   = $room->intRoomId;
            $bed->intBedStatus  =   1;

            $bed->save();
        }

        return redirect('room');
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
