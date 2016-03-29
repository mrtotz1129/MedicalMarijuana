<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EquipmentRequest;
use App\Http\Controllers\Controller;

use App\EquipmentModel;
use App\EquipmentTypeModel;
use App\SupplierModel;
use App\RoomModel;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipmentTypes = EquipmentTypeModel::where('intStatus', 1)
            ->get();

        $equipments = \DB::table('tblEquipment')
            ->join('tblEquipmentCategory', 'tblEquipmentCategory.intEquipmentCategoryId', '=', 'tblEquipment.intEquipmentCategoryIdFK')
            ->where('tblEquipment.intStatus', '>', 0)
            ->select('tblEquipment.intEquipmentId', 'tblEquipment.strEquipmentCode', 'tblEquipmentCategory.strEquipmentCatName')
            ->get();

        $rooms = RoomModel::where('intRoomStatus', '>', 0)
            ->get();

        $suppliers = SupplierModel::where('intStatus', '>', 0)
            ->get();

        return view('maintenance-equipment')
            ->with('equipments', $equipments)
            ->with('equipmentTypes', $equipmentTypes)
            ->with('rooms', $rooms)
            ->with('suppliers', $suppliers);
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
    public function store(EquipmentRequest $request)
    {
        $equipmentImgPath = 'uploaded_images/equipment';
        $equipment = new EquipmentModel;

        $equipment->strEquipmentCode            =   $request->strEquipmentCode;
        $equipment->intEquipmentCategoryIdFK    =   $request->equipmentType;
        $equipment->intRoomIdFK                 =   $request->room;
        $equipment->intStatus                   =   1;
        $equipment->intSupplierIdFK             =   $request->supplier;

        if($request->hasFile('image'))
        {
            $request->file('image')->move(public_path() . '/' . $equipmentImgPath, $request->strEquipmentCode);
            $equipment->txtEquipmentImgPath =   $equipmentImgPath . '/' . $request->strEquipmentCode;
        } 
        else 
        {
            $equipment->txtEquipmentImgPath =   null;
        }

        $equipment->save();

        return redirect('equipment');
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
        $equipment = EquipmentModel::find($id);

        $equipment->intStatus = 0;

        $equipment->save();
    }

    public function createEquipment(Request $request)
    {
        $arrForm = [];

        parse_str($request->formData, $arrForm);

        $equipmentType = new EquipmentTypeModel;

        $equipmentType->strEquipmentCatName =   $arrForm['createEquipmentType'];
        $equipmentType->intStatus           =   1;

        $equipmentType->save();

        return response()->json($equipmentType);
    }
}
