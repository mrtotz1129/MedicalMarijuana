<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UOMModel;
use App\ItemModel;
use App\InventoryModel;
use App\DiscountModel;
use App\PosModel;
use App\ItemPriceModel;
use App\GenericModel;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measurementList = UOMModel::where('intStatus', 1)
            ->get();
        $itemList = ItemModel::where('intItemStatus', 1)
            ->get();
        foreach ($itemList as $item) {
            $inventory = InventoryModel::where('intItemIdFK', $item->intItemId)
                ->orderBy('created_at', 'desc')
                ->first();
            if ($inventory != null){
                $item->inventory = $inventory->deciAfterValue;
            }else{
                $item->inventory = 0;
            }
            $generic = GenericModel::find($item->intGenericNameIdFK);
            $item->generic = $generic->strGenericName;
        }
        $discountList = DiscountModel::where('intDiscountStatus', 1)
            ->get();
        $patientList = \DB::table('tblPatient')
            ->join('tblAdmission', 'tblAdmission.intPatientIdFK', '=', 'tblPatient.intPatientId')
            ->get();

        return view('transaction-pos')
            ->with('measurementList', $measurementList)
            ->with('itemList', $itemList)
            ->with('discountList', $discountList)
            ->with('patientList', $patientList);
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

        if($request->patientType == 1){
            $pos = new PosModel;
            // $pos->intEmployeeIdFK = session()->get('intEmployeeId');
            $pos->intEmployeeIdFK = 1;
            $pos->deciAmountPaid = $request->dblPayment;
            $pos->save();

            $itemList = json_decode($request->itemList, true);
            foreach ($itemList as $item) {
                $itemModel = ItemModel::where('strItemName', $item['itemName'])
                    ->first();
                $measurement = UOMModel::where('strUnitOfMeasurementAbbrev', $item['itemMeasurement'])
                    ->first();
                $itemPrice = ItemPriceModel::where('intItemIdFK', $itemModel->intItemId)
                    ->where('intUnitOfMeasurementIdFK', $measurement->intUnitOfMeasurementId)
                    ->select('intItemPriceId')
                    ->orderBy('created_at', 'desc')
                    ->first();
                \DB::table('tblPointOfSaleDetail')
                    ->insert([
                        'intPointOfSaleIdFK'    => $pos->intPointOfSaleId,
                        'intItemIdFK'           => $itemModel->intItemId,
                        'intQuantity'           => $item['itemQuantity'],
                        'intItemPriceIdFK'      => $itemPrice->intItemPriceId
                        ]);

                $inventoryPrev = InventoryModel::where('intItemIdFK', $itemModel->intItemId)
                    ->orderBy('created_at', 'desc')
                    ->first();

                $inventory = new InventoryModel;
                $inventory->intItemIdFK = $itemModel->intItemId;
                if ($inventoryPrev == null){
                    $inventoryPrevValue = 0;
                }else{
                    $inventoryPrevValue = $inventoryPrev->deciAfterValue;
                }

                $inventory->deciPrevValue = $inventoryPrevValue;
                $newInventory = $inventoryPrevValue-($item['itemQuantity']*$measurement->dblEquivalent);
                $inventory->deciAfterValue = $newInventory;
                $inventory->strReason = "minus";
                $inventory->save();

            }
                
            $discountList = $request->discountList;
            if ($discountList != null){
                foreach ($discountList as $discount) {
                    \DB::table('tblPointOfSaleDiscount')
                        ->insert([
                            'intPointOfSaleIdFK'    => $pos->intPointOfSaleId,
                            'intDiscountIdFK'       => $discount
                        ]);
                }
            }
        }else{



        }
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
