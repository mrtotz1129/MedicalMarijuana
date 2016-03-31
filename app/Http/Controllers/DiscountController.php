<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RequirementModel;
use App\DiscountModel;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requirementList = RequirementModel::where('intRequirementStatus', '>', 0)
            ->get();
        $discountList = DiscountModel::where('intDiscountStatus', '>', 0)
            ->get();
        return view('maintenance-discount')
            ->with('requirementList', $requirementList)
            ->with('discountList', $discountList);
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
        $requirementList[] = $request->requirementList;
        $discount = new DiscountModel;

        $discount->strDiscountName = $request->strDiscountName;
        $discount->intDiscountTypeId = $request->intDiscountTypeId;
        if ($discount->intDiscountTypeId == 1){
            $discount->dblDiscountPercent = $request->dblDiscount;
        }else{
            $discount->dblDiscountAmount = $request->dblDiscount;
        }
        $discount->intDiscountStatus = 1;
        $discount->save();

       foreach ($requirementList[0] as $requirement){
            \DB::table('tblDiscountDetail')
                ->insert([
                    'intDiscountIdFK' => $discount->intDiscountId,
                    'intRequirementIdFK' => $requirement,
                    'intStatus' => 1
                ]);
        }

        return redirect('discount');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discount = DiscountModel::find($id);
        return response()->json($discount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discount = \DB::table('tblDiscount')
            ->select('intDiscountId', 'intDiscountTypeId', 'strDiscountName', 'dblDiscountPercent', 'dblDiscountAmount')
            ->where('intDiscountId', $id)
            ->first();

        $discRequirements = \DB::table('tblDiscount')
            ->join('tblDiscountDetail', 'tblDiscount.intDiscountId', '=', 'tblDiscountDetail.intDiscountIdFK')
            ->select('tblDiscountDetail.intRequirementIdFK')
            ->where('tblDiscount.intDiscountId', $id)
            ->get();

        return response()->json([$discount, $discRequirements]);
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

        parse_str($request->form, $arrForm);
            
        $discount = DiscountModel::find($id);

        $discount->strDiscountName = $arrForm['strDiscountName'];
        $discount->intDiscountTypeId = $arrForm['intDiscountTypeId'];
        if ($discount->intDiscountTypeId == 1){
            $discount->dblDiscountPercent = $arrForm['dblDiscount'];
        }else{
            $discount->dblDiscountAmount = $arrForm['dblDiscount'];
        }
        // $discount->intDiscountStatus = 1;
        $discount->save();

        \DB::table('tblDiscountDetail')
                ->where('intDiscountIdFK', $id)
                ->delete();


        // return response()->json($requirementList);
        if(isset($arrForm['requirementList']))
        {
            $requirementList[] = $arrForm['requirementList'];

            foreach ($requirementList[0] as $requirement){
                \DB::table('tblDiscountDetail')
                    ->insert([
                        'intDiscountIdFK' => $discount->intDiscountId,
                        'intRequirementIdFK' => $requirement,
                        'intStatus' => 1
                    ]);
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
        $discount = DiscountModel::find($id);

        $discount->intDiscountStatus = 0;

        $discount->save();
    }
}
